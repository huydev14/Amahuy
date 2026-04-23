<template>
    <footer class="login-footer">
        <div class="footer-links">
            <a href="#">Điều khoản sử dụng</a>
            <a href="#">Thông báo Bảo mật</a>
            <a href="#">Trợ giúp</a>
        </div>
        <p class="footer-copyright">© 2024-2026, Amazon.com, Inc. hoặc các chi nhánh của nó</p>
    </footer>
</template>

<style scoped>
/* Copy phần CSS của footer từ file cũ mang sang đây */
.login-footer {
    width: 100%;
    margin-top: 26px;
    padding-top: 26px;
    border-top: 1px solid #ddd;
    background-color: #fbfbfb;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding-bottom: 30px; /* Thêm chút padding dưới cho thoáng */
}
.footer-links {
    margin-bottom: 10px;
}
.footer-links a {
    color: #0066c0;
    text-decoration: none;
    font-size: 11px;
    margin: 0 10px;
}
.footer-links a:hover {
    text-decoration: underline;
}
.footer-copyright {
    font-size: 11px;
    color: #555;
    margin: 0;
}
</style>
