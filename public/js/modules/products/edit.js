Mask.setMoneyField('#value-product')
Mask.setMoneyField('#value-promotional-product')

elementProperty.addEventInElement('.delete-image','onclick',function (e){
    e.stopPropagation();
    let id = this.getAttribute('id');
    SwalCustom.dialogConfirm('Deseja apagar essa imagem?','',function (){
        ProductController.deleteImage(id).then(response => {
            if(response.status)
                return swal('Imagem excluida com sucesso', '', 'success');
                
            return swal('Erro ao deletar imagem', 'Contate o suporte', 'error');

        })
    })
})
