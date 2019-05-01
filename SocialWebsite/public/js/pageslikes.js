
$(".pageslikes").on('click',function(){
    alert('test');
var like_s= $(this).attr('data-like');
var page_id= $(this).attr('data-Page');
var owner_id=$(this).attr('data-owner');
var token=$(this).attr('data-token');
/* alert(like_s.concat(" ",page_id," ",owner_id,"   ",token)); */
$.ajax({
    method: 'POST',
    url: "/pagelikes",
    data:{ like_s: like_s,page_id: page_id,owner_id: owner_id, _token: token},
    
    success:function(data)
    {
        alert(url);
    }
    
})


});