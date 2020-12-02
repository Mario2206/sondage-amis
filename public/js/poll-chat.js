const path = $("#poll-chat-form").attr("action");

function displayMessages() {

    $.ajax({
        url : path, 
        dataType : "Json"
    })
    .done((res) => {

        const messagesHTML = res.map((mess) => (`
            <div>
                <p>
                    ${mess.value}
                </p>
                <span>
                    ${mess.author}
                </span>
            </div>
        `))

        $("#poll-chat").html(messagesHTML.join(""))

    })

}

$('#poll-chat-form').submit( (e) => {
    e.preventDefault()

    const message = $(e.target).serializeArray()[0].value

    $.ajax({
        url : path, 
        method : "POST",
        data : { "poll-message" : message}
    })
    .done(()=> {
        displayMessages();
    })
})