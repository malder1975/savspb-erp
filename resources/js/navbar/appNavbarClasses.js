export const navbarCssClasses = [
    'sidebar-show',
    'sidebar-sm-show',
    'sidebar-md-show',
    'sidebar-lg-show',
    'sidebar-xl-show'
]

export const validBreakpoints = [
    'sm', 'md', 'lg', 'xl'
]

export function checkBreakpoint(breakpoint, list) {
    return list.indexOf(breakpoint) > -1
}
