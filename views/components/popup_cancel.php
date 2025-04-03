<!-- views/components/popup_cancel.php -->
<div id="popup-cancel-overlay" style="display:none; position: fixed; top: 0; left: 0; right: 0; bottom: 0;
     background: rgba(0,0,0,0.3); z-index: 9999; justify-content: center; align-items: center;">

    <form action="/approval_system/public/requests/cancel" method="POST" id="cancel-form" class="popup-cancel-body">
        <div class="popup-cancel-header">
            <span class="popup-cancel-header-text">Thông báo</span>
        </div>

        <div class="popup-cancel-reason">Lý do hủy đơn <span>*</span></div>
        <input type="hidden" name="request_id" id="cancel-request-id">
        <input type="text" class="popup-cancel-input" name="reason_cancel" id="cancel-reason-text" required>

        <div class="popup-cancel-footer">
            <button type="submit" class="popup-cancel-button">OK</button>
        </div>
    </form>
</div>

<style>
    .popup-cancel-body {
        width: 614px;
        height: 356px;
        background: white;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        position: relative;
        border-radius: 4px;
    }

    .popup-cancel-header {
        width: 100%;
        height: 74px;
        background: rgba(0, 126, 198, 1);
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
        display: flex;
        align-items: center;
        padding-left: 37px;
    }

    .popup-cancel-header-text {
        font-family: 'Noto Sans JP', sans-serif;
        font-weight: 400;
        font-size: 24px;
        color: white;
    }

    .popup-cancel-reason {
        position: absolute;
        top: 118px;
        left: 37px;
        font-family: 'Noto Sans JP', sans-serif;
        font-weight: 400;
        font-size: 24px;
        color: black;
    }

    .popup-cancel-reason span {
        color: red;
    }

    .popup-cancel-input {
        position: absolute;
        width: 540px;
        height: 76px;
        top: 166px;
        left: 37px;
        border-radius: 4px;
        border: 1px solid #ccc;
        background: rgba(255, 255, 255, 0.5);
        padding: 8px;
        font-size: 16px;
    }

    .popup-cancel-footer {
        width: 100%;
        height: 114px;
        position: absolute;
        bottom: 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .popup-cancel-button {
        width: 220px;
        height: 50px;
        border-radius: 4px;
        background: rgba(0, 126, 198, 1);
        border: 1px solid rgba(204, 204, 204, 1);
        color: white;
        font-size: 18px;
        cursor: pointer;
    }
</style>

<script>
    // Hàm mở popup từ ngoài
    function openCancelPopup(requestId) {
        document.getElementById('cancel-request-id').value = requestId;
        document.getElementById('cancel-reason-text').value = '';
        document.getElementById('popup-cancel-overlay').style.display = 'flex';
    }

    function validateCancelReason() {
        const reason = document.getElementById('cancel-reason-text').value.trim();
        if (!reason) {
            alert("Vui lòng nhập lý do hủy đơn.");
            document.getElementById('cancel-reason-text').focus();
            return false;
        }
        return true;
    }
    
</script>
