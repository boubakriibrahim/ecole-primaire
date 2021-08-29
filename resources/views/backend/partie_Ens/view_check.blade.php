
<html>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(function () {
            let btn=document.getElemenyById('List')
            btn.onclick= function (e) {
              var nb = {!! json_encode($nb) !!};
              alert('hello');
              if(nb==0){
                e.preventDefault();
                var link = $(this).attr("href");

                Swal.fire({
                    title: 'هل انت متأكد؟',
                    text: "لن تتمكن من العودة",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'إلغاء',
                    confirmButtonText: 'نعم ، احذفها'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                            'تم الحذف',
                            'تم حذف هذا المدرس.',
                            'نجاح'
                        )
                    }
                })

              }
            };
        };

    </script>
</html>
