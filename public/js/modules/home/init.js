elementProperty.addEventInElement('#search-sale','oninput',function (){
    let key = this.value;
    elementProperty.getElement('.through-salesman', cards => {
        let data = JSON.parse(cards.getAttribute('data'));
        let user = cards.getAttribute('user');
        user = user.toUpperCase();
        if(!user.startsWith(key.toUpperCase()))
            return cards.style.display = 'none'
        return cards.style.display = ''
    })
})

elementProperty.addEventInElement('#search-sale-id','oninput',function (){
    let key = this.value;
    elementProperty.getElement('.through-salesman', cards => {
        let id = cards.getAttribute('id');
        // if(id.startsWith(key))
        //     return cards.style.display = ''
        // return cards.style.display = 'none'
        if(id !== key)
            return cards.style.display = 'none'
        return cards.style.display = ''
    })
})

elementProperty.addEventInElement('#clear-filter','onclick',function (){
    elementProperty.getElement('.through-salesman', cards => {
        return cards.style.display = ''
    })
    elementProperty.getElement('#search-sale-id', these => {
        these.value = '';
    })
})
