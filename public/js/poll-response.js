const pollId = $("#poll-response-form").data("poll-id");
let currentResponse = 1

function displayQuestion (question) {
    
    $(`
    
        <div>
            <label></label>
        </div>
    
    `)

}

$.ajax({
    url : MAIN_PATH + "/poll/response/" + pollId + "/" + currentResponse,
    // accepts : {
    //     json : 'application/json'
    // },
    // dataType : "Json"
})
.done((res)=> {
    console.log(typeof res);
    console.log(res);
})