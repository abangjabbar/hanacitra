const notifSet = new Set();


function redirect_to_order(base_url, orderId) {
    const orderUrl = base_url + "/order/" + orderId;
    window.location.replace(orderUrl);
}

function show_notif_counter() {
    if (notifSet.size > 0) {
        $('#notifCounter')[0].innerHTML = notifSet.size;
        $('#notifCounter')[0].style.display = "block";
    } else {
        $('#notifCounter')[0].style.display = "none";
    }
}

function queryNotif(base_url) {
    console.log(base_url);
    const url = base_url + "/queryNotif";
    $.ajax({
        url: url,
        method: "GET",
        success: function (data) {
            const notifSetCopy = new Set(JSON.parse(JSON.stringify(Array.from(notifSet))));
            JSON.parse(data).forEach(notifikasi => {
                if (!notifSet.has(notifikasi.id)) {
                    notifSet.add(notifikasi.id);
                    const ul = document.getElementById('notifikasi');
                    const li = document.createElement('li');
                    li.setAttribute('style', 'cursor: pointer;')
                    const small = document.createElement('small');
                    small.appendChild(document.createTextNode(`Order Nomor ${notifikasi.order_nomor} ${notifikasi.status}`));
                    li.appendChild(small);
                    li.id = "notif-" + notifikasi.id;
                    li.className = 'list-group-item';
                    li.addEventListener('click', () => redirect_to_order(base_url, notifikasi.order_id));
                    ul.insertBefore(li, ul.firstChild);
                } else {
                    notifSetCopy.delete(notifikasi.id);
                }
            });

            notifSetCopy.forEach(notifikasiId => {
                notifSet.delete(notifikasiId);
                var element = document.getElementById("notif-" + notifikasiId);
                element.parentNode.removeChild(element);
            })

            show_notif_counter();
        }
    })
}

