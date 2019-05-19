export default 
function toggleClasses (toggleClass, classList, force) {
    let level = classList.indexOf(toggleClass)
    let removeClassList = classList.slice(0, level)
    removeClassList.map((className) => document.body.classList.remove(className))
    document.body.classList.toggle(toggleClass, force)
}