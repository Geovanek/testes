<script type="text/javascript">

    @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'success') }}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}", 'Info', {
                    progressBar: true,
                    timeOut: 10000,
                    showMethod: "slideDown",
                    hideMethod: "fadeOut",
                    positionClass: "toast-bottom-right",
                });
                break;
            
            case 'warning':
                toastr.warning("{{ Session::get('message') }}", 'Oops!', {
                    progressBar: true,
                    timeOut: 10000,
                    showMethod: "slideDown",
                    hideMethod: "fadeOut",
                    positionClass: "toast-bottom-right",
                });
                break;
    
            case 'success':
                toastr.success("{{ Session::get('message') }}", 'Sucesso', {
                    progressBar: true,
                    timeOut: 10000,
                    showMethod: "slideDown",
                    hideMethod: "fadeOut",
                    positionClass: "toast-bottom-right",
                });
                break;
    
            case 'error':
                toastr.error("{{ Session::get('message') }}", 'Erro', {
                    progressBar: true,
                    timeOut: 10000,
                    showMethod: "slideDown",
                    hideMethod: "fadeOut",
                    positionClass: "toast-bottom-right",
                });
                break;
        }
    @endif
</script>