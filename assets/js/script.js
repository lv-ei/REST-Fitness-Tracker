const menuli = document.querySelectorAll('.admin-sidebar-content > ul > li > a')
const subMenu = document.querySelectorAll('.sub-menu')
for(let i = 0 ; i < menuli.length ;i++){
    menuli[i].addEventListener('click', (e)=>{
        e.preventDefault()
        // menuli[i].parentNode.querySelector('ul').classList.toggle('active')
        for (let index = 0; index < subMenu.length; index++) {
            subMenu[index].setAttribute('style','height: 0px')
            
        }
        const submenuHeight = menuli[i].parentNode.querySelector('ul .sub-menu-item').offsetHeight
        menuli[i].parentNode.querySelector('ul').setAttribute('style','height: '+submenuHeight+'px')
        console.log(submenuHeight)
    })
}