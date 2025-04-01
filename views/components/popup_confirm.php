<!-- views/components/popup_confirm.php -->
<div id="popup-confirm-overlay" style="display: none;">
    <div class="popup-confirm-body">
        <div class="popup-confirm-header">
            <span class="popup-header-text">Thông báo</span>
        </div>
        <div class="popup-message" id="popup-message">Bạn có chắc chắn lưu lại thay đổi ?</div>
        <div class="popup-footer">
            <button id="popup-ok" class="popup-btn popup-ok-btn">OK</button>
            <button id="popup-cancel" class="popup-btn popup-cancel-btn">Cancel</button>
        </div>
    </div>
</div>

<style>
    #popup-confirm-overlay {
        position: fixed;
        top: 0; left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .popup-confirm-body {
        width: 614px;
        height: 297px;
        background: white;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        position: relative;
        box-sizing: border-box;
        border-radius: 6px; /* ✅ Thêm bo góc để khớp với header */
        overflow: hidden;   /* ✅ Ngăn header tràn ra ngoài */
    }

    .popup-confirm-header {
        width: 100%;
        height: 74px;
        background: rgba(0, 126, 198, 1);
        display: flex;
        align-items: center;
        padding-left: 37px;
        border-top-left-radius: 6px;   /* ✅ Bo góc trái */
        border-top-right-radius: 6px;  /* ✅ Bo góc phải */
    }

    .popup-header-text {
        color: white;
        font-size: 24px;
        font-family: 'Noto Sans JP', sans-serif;
    }

    .popup-message {
        position: absolute;
        top: 118px;
        left: 37px;
        font-size: 20px;
        font-family: 'Noto Sans JP', sans-serif;
    }

    .popup-footer {
        position: absolute;
        bottom: 20px;
        width: 100%;
        display: flex;
        justify-content: center;
        gap: 40px;
    }

    .popup-btn {
        width: 220px;
        height: 50px;
        font-size: 16px;
        border-radius: 4px;
        border: 1px solid #ccc;
        font-family: 'Noto Sans JP', sans-serif;
        cursor: pointer;
    }

    .popup-ok-btn {
        background: rgba(0, 126, 198, 1);
        color: white;
    }

    .popup-cancel-btn {
        background: rgba(226, 0, 92, 1);
        color: white;
    }
</style>
