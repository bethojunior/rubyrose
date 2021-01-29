Mask.setMoneyField('#value-product')
Mask.setMoneyField('#value-promotional-product')

elementProperty.addEventInElement('.delete-image','onclick',function (){
    let id = this.getAttribute('id');
    SwalCustom.dialogConfirm('Deseja apagar essa imagem?','',function (){
        ProductController.deleteImage(id).then(response => {
            console.log(response)
        })
    })
})
