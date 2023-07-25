import './bootstrap';


console.log(GlobalsVar.userId);

const audio = document.getElementById('myAudio');






//prepare to get real time notif
window.Echo.channel("notify").listen(".post.added",(e)=>{

    var notifications = document.querySelector("body > nav > div > div.d-flex.align-items-center > div:nth-child(2) > ul")
var count = document.querySelector("#navbarDropdownMenuLink > span")
var notif = e.notf
var li = `<li style="height:auto; " class="unread">
<a class="dropdown-item" href="${notif.url}"> <p style="text-wrap: wrap; line-height: 1.5;"> ${notif.title} </p> <b> ${notif.time} </b>   </a>
</li>`
var divider = `<li><hr class="dropdown-divider"></li>`
var lastChild = Array.from(notifications.children).filter((e)=> e.classList.contains("read")).slice(-1)[0]
    audio.autoplay = true
    audio.play()


    // remove last child
    notifications.removeChild(lastChild)

    // add to the count
    count.innerHTML = Number(count.innerHTML) + 1

    // insert divider
    notifications.insertAdjacentHTML("afterbegin",String(divider))

    // insert the element
    notifications.insertAdjacentHTML("afterbegin",String(li))










})




