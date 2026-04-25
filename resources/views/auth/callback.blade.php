<!DOCTYPE html>
<html>
<head><title>Đang xác thực...</title></head>
<body>
    <script>
        const payload = {
            token: "{{ $token ?? '' }}",
            user: {!! isset($user) ? json_encode($user) : 'null' !!},
            error: "{{ $error ?? '' }}"
        };
        if (window.opener) {
            window.opener.postMessage(payload, "*");

            setTimeout(() => {
                window.close();
            }, 100);
        }
    </script>
</body>
</html>
