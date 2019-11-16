//let columns = ['NUM','DAT','BUYER_NAME','S_GOOD','S_OPL','FSTATE']
export default [
    {
        name: 'NUM',
        title: '№ заказа',
        sortField: 'NUM',
        titleClass: 'text-center'
    },
    {
        name: 'DAT',
        title: 'Дата',
        sortField: 'DAT',
        titleClass: 'text-center',
        callback: 'formatDate|DD.MM.YYYY'
    },
    {
        name: 'BUYER_NAME',
        title: 'ФИО покупателя',
        sortField: 'BUYER_NAME',
        titleClass: 'text-center'
    },
    {
        name: 'S_GOOD',
        title: 'Сумма заказа',
        titleClass: "text-center",
        dataClass: "text-right",
        callback: "formatNumber"
    },
    {
        name: 'S_OPL',
        title: 'Сумма оплаты',
        titleClass: "text-center",
        dataClass: "text-right",
        callback: 'formatNumber'
    },
    {
        name: 'FSTATE',
        title: 'Статус заказа',
        sortField: 'FSTATE',
        titleClass: "text-center",
        callback: 'zakazState'
    }
]
