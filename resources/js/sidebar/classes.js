export let  sidebarCssClasses = [
    'sidebar-show',
    'sidebar-sm-show',
    'sidebar-md-show',
    'sidebar-lg-show',
    'sidebar-xl-show'
]

export let asideMenuCssClasses = [
    'asidemenu-show',
    'asidemenu-sm-show',
    'asidemenu-md-show',
    'asidemenu-lg-show',
    'asidemenu-xl-show'
]

export let validBreakpoints = [ 'sm', 'md', 'lg', 'xl' ]

export function checkBreakpoint(breakpoint, list) {
    return list.indexOf(breakpoint) > -1
}