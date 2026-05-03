import "./bootstrap";

document.addEventListener("DOMContentLoaded", function () {
    console.log("APP JS LOADED");

    const chatBox = document.getElementById("chat-box");
    const form = document.getElementById("chat-form");
    const messageInput = document.getElementById("message-input");

    // =========================
    // FUNCTION BUAT AVATAR
    // =========================
    function buildAvatar(userName, photoPath, isMe) {
        if (photoPath) {
            return `<img src="/storage/${photoPath}" 
                        class="chat-avatar ${isMe ? "ms-2" : "me-2"}">`;
        } else {
            return `<div class="chat-avatar chat-initial ${isMe ? "ms-2" : "me-2"}">
                        ${userName.charAt(0).toUpperCase()}
                    </div>`;
        }
    }

    // =========================
    // REALTIME LISTENER
    // =========================
    if (window.classId && chatBox) {
        Echo.channel("class." + window.classId).listen("MessageSent", (e) => {
            let isMe = e.user_id == window.userId; // 🔥 WAJIB ADA

            let fileHtml = "";

            if (e.file_path) {
                let ext = e.file_name.split(".").pop().toLowerCase();

                if (["jpg", "jpeg", "png", "gif"].includes(ext)) {
                    fileHtml = `<img src="/storage/${e.file_path}" 
                        style="max-width:200px;border-radius:10px;margin-top:5px;">`;
                } else {
                    fileHtml = `<a href="/storage/${e.file_path}" target="_blank">
                        📎 ${e.file_name}
                    </a>`;
                }
            }

            chatBox.innerHTML += `
<div class="d-flex ${isMe ? "justify-content-end" : "justify-content-start"} align-items-end mb-3"
     data-wrapper-id="${e.id}">

    ${
        !isMe
            ? e.photo
                ? `<img src="/storage/${e.photo}" class="chat-avatar me-2">`
                : `<div class="chat-avatar chat-initial me-2">${e.user.charAt(0).toUpperCase()}</div>`
            : ""
    }

    <div class="chat-bubble ${isMe ? "bubble-me" : "bubble-other"}"
         ondblclick="confirmDelete(${e.id})">

        <small class="fw-bold d-block mb-1">
            ${e.user}
        </small>

        ${e.message ? `<div>${e.message}</div>` : ""}
        ${fileHtml}

        <div class="chat-time">
            ${e.time}
        </div>
    </div>

    ${
        isMe
            ? window.currentUserPhoto
                ? `<img src="/storage/${window.currentUserPhoto}" class="chat-avatar ms-2">`
                : `<div class="chat-avatar chat-initial ms-2">${window.currentUserName.charAt(0).toUpperCase()}</div>`
            : ""
    }

</div>
`;

            chatBox.scrollTop = chatBox.scrollHeight;
        });
    }
    if (form && messageInput) {
        const fileInput = document.getElementById("file-input");
        const filePreview = document.getElementById("file-preview");

        if (fileInput) {
            fileInput.addEventListener("change", function () {
                const file = this.files[0];
                if (!file) return;

                let ext = file.name.split(".").pop().toLowerCase();

                filePreview.classList.remove("d-none");

                if (["jpg", "jpeg", "png", "gif"].includes(ext)) {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        filePreview.innerHTML = `
                    <div class="d-flex align-items-center gap-2">
                        <img src="${e.target.result}" 
                             style="max-width:80px;border-radius:8px;">
                        <span>${file.name}</span>
                        <button type="button" class="btn btn-sm btn-danger" id="remove-file">✕</button>
                    </div>
                `;
                        attachRemove();
                    };
                    reader.readAsDataURL(file);
                } else {
                    filePreview.innerHTML = `
                <div class="d-flex align-items-center gap-2">
                    📎 ${file.name}
                    <button type="button" class="btn btn-sm btn-danger" id="remove-file">✕</button>
                </div>
            `;
                    attachRemove();
                }
            });
        }

        function attachRemove() {
            document
                .getElementById("remove-file")
                .addEventListener("click", function () {
                    fileInput.value = "";
                    filePreview.innerHTML = "";
                    filePreview.classList.add("d-none");
                });
        }

        document
            .getElementById("send-btn")
            .addEventListener("click", function () {
                let message = messageInput.value.trim();
                let fileInput = document.getElementById("file-input");
                let file = fileInput.files[0];

                if (!message && !file) return;

                let formData = new FormData();
                formData.append("message", message);
                formData.append("class_id", window.classId);

                if (file) {
                    formData.append("file", file);
                }

                axios
                    .post("/chat/send", formData)
                    .then((res) => {
                        const msg = res.data.message;
                        const isMe = true;

                        let fileHtml = "";

                        if (msg.file_path) {
                            let ext = msg.file_name
                                .split(".")
                                .pop()
                                .toLowerCase();

                            if (["jpg", "jpeg", "png", "gif"].includes(ext)) {
                                fileHtml = `<img src="/storage/${msg.file_path}" 
                style="max-width:200px;border-radius:10px;margin-top:5px;">`;
                            } else {
                                fileHtml = `<a href="/storage/${msg.file_path}" target="_blank">
                📎 ${msg.file_name}
            </a>`;
                            }
                        }

                        chatBox.innerHTML += `
<div class="d-flex justify-content-end align-items-end mb-3"
     data-wrapper-id="${msg.id}">

    <div class="chat-bubble bubble-me"
         ondblclick="confirmDelete(${msg.id})">

        <small class="fw-bold d-block mb-1">
            ${msg.user.name}
        </small>

        ${msg.message ? `<div class="chat-text">${msg.message}</div>` : ""}

        ${fileHtml}

        <div class="chat-time">
            ${new Date(msg.created_at).toLocaleTimeString([], { hour: "2-digit", minute: "2-digit" })}
        </div>
    </div>

    ${
        window.currentUserPhoto
            ? `<img src="/storage/${window.currentUserPhoto}" class="chat-avatar ms-2">`
            : `<div class="chat-avatar chat-initial ms-2">${window.currentUserName.charAt(0).toUpperCase()}</div>`
    }

</div>
`;

                        chatBox.scrollTop = chatBox.scrollHeight;

                        // RESET
                        messageInput.value = "";
                        fileInput.value = "";

                        if (filePreview) {
                            filePreview.innerHTML = "";
                            filePreview.classList.add("d-none");
                        }
                    })
                    .catch((err) => console.error(err));
            });
    }
});

window.deleteMessage = function (id) {
    axios
        .delete(`/chat/delete/${id}`)
        .then(() => {
            let wrapper = document.querySelector(`[data-wrapper-id='${id}']`);
            if (wrapper) wrapper.remove();
        })
        .catch((err) => console.error(err));
};
