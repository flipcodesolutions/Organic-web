
<script>
    function openDeleteModal(url) {
        Swal.fire({
            title: 'Are you sure you want to deactive it?',
            text: "You will be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            // confirmButtonColor: '#d33',
            // cancelButtonColor: '#6e7881',
            confirmButtonText: 'Yes, Deactive it!',
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to the delete route
                window.location.href = url;
            }
        });
    }
</script>

