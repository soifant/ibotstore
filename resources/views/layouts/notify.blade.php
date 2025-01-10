<script>
    const notyf = new Notyf({
        duration: 5000,
        position: {
            x: 'right',
            y: 'top'
        },
        dismissible: true
    });
    
    @if(session('success'))
        notyf.success("{{ session('success') }}");
    @elseif(session('error'))
        notyf.error("{{ session('error') }}");
    @endif
</script>