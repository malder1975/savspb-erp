const togglePs = {
    methods: {
        togglePs(toggle) {
            const sidebar = document.querySelector('.sidebar-nav section')
            if (sidebar) {
                if (toggle) {
                    sidebar.classList.add('ps', 'ps-container', 'ps--active-y')
                } else {
                    sidebar.classList.remove('ps', 'ps-container', 'ps--active-y')
                }
            }
        }
    }
}
export {togglePs}
