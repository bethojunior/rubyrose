class ProductController extends ConnectionServer{
    static deleteImage(id)
    {
        return new Promise(resolve => {
            this.sendRequest(`productsImage/${id}`,'DELETE',null,resolve,true)
        })
    }
}
