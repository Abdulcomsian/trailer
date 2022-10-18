<script type="text/javascript" src="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js"></script>
<script>
    $(function () {
        //Delete Confirmation
        $(document).on("click",".confirm",function(event) {

            event.preventDefault();
            let form_id = '';
            let link = '';
            text='Are you sure? to Delete it.';
            if($(event.target).is('button')){
               form_id = '#form_'+ $(this).attr('id');
            }else if($(event.target).is('span')){
                form_id = '#form_'+ $(this).closest('button').attr('id');
            }else if($(event.target).is('svg')){
                form_id = '#form_'+ $(this).closest('button').attr('id');
            }
            else if($(event.target).is('i')){
                let type= $(this).closest('button').attr('data-type')
                if(type)
                {
                    form_id = '#refundform_'+ $(this).closest('button').attr('id');
                    text='Are you Sure? to Refund it.';
                }
                else{
                     form_id = '#form_'+ $(this).closest('button').attr('id');
                }
               
            }else{
                link = $(this).attr('href');
            }
            swal({
                    title:text,
                    text: "You will not be able to recover this record!",
                    type: "warning",
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Yes!',
                    showCancelButton: true,
                    closeOnConfirm: false,
                    //closeOnCancel: false
                },
                function(){
                    swal("Deleted!", "Record has been deleted!", "success");
                    if (link){
                        window.location = link;
                    }
                    if (form_id){
                        $(form_id).submit();
                    }
                });
        });
    });
</script>
