class WindowUtil{
    constructor(){

    }

    /**
     * Auto open popup and align center screen
     * @param link
     * @param title
     * @param w: int: Width
     * @param h: init: Height
     */
    openPopupWindow (link, title = 'Eden', w = 1000, h = 500){
        var left = (screen.width/2)-(w/2);
        var top = (screen.height/2)-(h/2);
        return window.open(link, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
    }
}

export default WindowUtil;