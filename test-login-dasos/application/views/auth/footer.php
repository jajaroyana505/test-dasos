</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {

        const alert = bootstrap.Alert.getOrCreateInstance('#general-error')

        $('#login-form').on('submit', function(e) {
            e.preventDefault();
            let formData = $(this).serialize();

            $.ajax({
                url: "<?= base_url('login') ?>",
                method: "POST",
                dataType: 'json',
                data: formData,
                success: function(res) {
                    if (res.status === 'success') {
                        window.location.href = "<?= base_url('admin') ?>"
                    } else {
                        if (res.errors.email != '') {
                            $('#email').removeClass('is-valid');
                            $('#email').addClass('is-invalid');
                            $('#email-error').html(res.errors.email)
                            $('#general-error').addClass('d-none')
                        } else {
                            $('#email').removeClass('is-invalid');
                            $('#email-error').html('')
                        }
                        if (res.errors.password != '') {
                            $('#password').removeClass('is-valid');
                            $('#password').addClass('is-invalid');
                            $('#password-error').html(res.errors.password)
                            $('#general-error').addClass('d-none')
                        } else {
                            $('#password').removeClass('is-invalid');
                            $('#password-error').html('')
                        }
                        if (res.errors.general != '') {
                            $('#general-error').removeClass('d-none')
                            $('#general-error').html(res.errors.general)
                        } else {

                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Terjadi kesalahan:", error);
                }
            });
        });
    });
</script>
</body>

</html>