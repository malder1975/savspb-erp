//let columns = ['NUM','DAT','BUYER_NAME','S_GOOD','S_OPL','FSTATE']
export default [
    {
        name: 'NUM',
        title: '№ заказа',
        sortField: 'NUM',
        titleClass: 'center alignet'
    },
    {
        name: 'DAT',
        title: 'Дата',
        sortField: 'DAT',
        titleClass: 'center alignet',
        callback: 'formatDate|DD.MM.YYYY'
    },
    {
        name: 'BUYER_NAME',
        title: 'ФИО покупателя',
        sortField: 'BUYER_NAME',
        titleClass: 'center alignet'
    },
    {
        name: 'S_GOOD',
        title: 'Сумма заказа',
        titleClass: "center alignet"
    },
    {
        name: 'S_OPL',
        title: 'Сумма оплаты',
        titleClass: "center alignet"
    },
    {
        name: 'FSTATE',
        title: 'Статус заказа',
        sortField: 'FSTATE',
        titleClass: "center alignet",
        formatter(value) {
            if (value == 0) {
                return 'Новый заказ'
            } else if (value == 1) {
                return 'Реализован'
            } else
                return 'В доставке'
        }
    }
]
