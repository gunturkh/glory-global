function updateTitlePreview(val){
	document.getElementById("TitlePreview").innerHTML = val;
}

function updateDescriptionPreview(val){
	document.getElementById("DescriptionPreview").innerHTML = val;
}

function updatePricePreview(val){
  document.getElementById('product_price').innerHTML = formatRupiah(val, 'IDR ');
  document.getElementById('PricePreview').innerHTML = formatRupiah(val, 'IDR ');
}

function updatePrice2Preview(val){
  document.getElementById('product_price2').innerHTML = formatRupiah(val, 'IDR ');
  document.getElementById('Price2Preview').innerHTML = formatRupiah(val, 'IDR ');
}

function formatRupiah(angka, prefix){
  var number_string = angka.replace(/[^,\d]/g, '').toString(),
  split       = number_string.split(','),
  sisa        = split[0].length % 3,
  rupiah        = split[0].substr(0, sisa),
  ribuan        = split[0].substr(sisa).match(/\d{1,3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if(ribuan){
    separator = sisa ? '.' : '';
    rupiah += separator + ribuan.join('.');
  }

  rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
  return prefix == undefined ? rupiah : (rupiah ? 'IDR ' + rupiah : '' + ',-');
}

function updateImagePreview(input){
	if (input.files && input.files[0]) {
       	var reader = new FileReader();

        reader.onload = function (e) {
            $('#image-preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

var previous_selected_icon = "icon-eye";

function selectIcon(icon)
{  
  if(previous_selected_icon !== icon){
    document.getElementById(previous_selected_icon).style.fontSize = "medium";
    previous_selected_icon = icon;
  }
  document.getElementById('_add_product_icon').value = icon;
  document.getElementById('_edit_product_icon').value = icon;
  document.getElementById('add_selected_product_icon').value = icon;
  document.getElementById('edit_selected_product_icon').value = icon;
  document.getElementById(icon).style.fontSize = "xx-large";
}


var arr_icons = ["icon-eye","icon-paper-clip","icon-mail","icon-toggle","icon-layout","icon-link","icon-bell","icon-lock",
"icon-unlock","icon-ribbon","icon-image","icon-signal","icon-target","icon-clipboard","icon-clock","icon-watch","icon-air-play",
"icon-camera","icon-video","icon-disc","icon-printer","icon-monitor","icon-server","icon-cog","icon-heart","icon-paragraph",
"icon-align-justify","icon-align-left","icon-align-center","icon-align-right","icon-book","icon-layers","icon-stack","icon-stack-2",
"icon-paper","icon-paper-stack","icon-search","icon-zoom-in","icon-zoom-out","icon-reply","icon-circle-plus","icon-circle-minus",
"icon-circle-check","icon-circle-cross","icon-square-plus","icon-square-minus","icon-square-check","icon-square-cross","icon-microphone",
"icon-record","icon-skip-back","icon-rewind","icon-play","icon-pause","icon-stop","icon-fast-forward","icon-skip-forward","icon-shuffle",
"icon-repeat","icon-folder","icon-umbrella","icon-moon","icon-thermometer","icon-drop","icon-sun","icon-cloud","icon-cloud-upload",
"icon-cloud-download","icon-upload","icon-download","icon-location","icon-location-2","icon-map","icon-battery","icon-head","icon-briefcase",
"icon-speech-bubble","icon-anchor","icon-globe","icon-box","icon-reload","icon-share","icon-marquee","icon-marquee-plus","icon-marquee-minus",
"icon-tag","icon-power","icon-command","icon-alt","icon-esc","icon-bar-graph","icon-bar-graph-2","icon-pie-graph","icon-star","icon-arrow-left",
"icon-arrow-right","icon-arrow-up","icon-arrow-down","icon-volume","icon-mute","icon-content-right","icon-content-left","icon-grid","icon-grid-2",
"icon-columns","icon-loader","icon-bag","icon-ban","icon-flag","icon-trash","icon-expand","icon-contract","icon-maximize","icon-minimize","icon-plus",
"icon-minus","icon-check","icon-cross","icon-move","icon-delete","icon-menu","icon-archive","icon-inbox","icon-outbox","icon-file","icon-file-add",
"icon-file-subtract","icon-help","icon-open","icon-ellipsis","icon-add-to-list","icon-classic-computer","icon-controller-fast-backward",
"icon-creative-commons-attribution","icon-creative-commons-noderivs","icon-creative-commons-noncommercial-eu","icon-creative-commons-noncommercial-us",
"icon-creative-commons-public-domain","icon-creative-commons-remix","icon-creative-commons-share","icon-creative-commons-sharealike",
"icon-creative-commons","icon-document-landscape","icon-remove-user","icon-warning","icon-arrow-bold-down","icon-arrow-bold-left",
"icon-arrow-bold-right","icon-arrow-bold-up","icon-arrow-down2","icon-arrow-left2","icon-arrow-long-down","icon-arrow-long-left",
"icon-arrow-long-right","icon-arrow-long-up","icon-arrow-right2","icon-arrow-up2","icon-arrow-with-circle-down","icon-arrow-with-circle-left",
"icon-arrow-with-circle-right","icon-arrow-with-circle-up","icon-bookmark","icon-bookmarks","icon-chevron-down","icon-chevron-left",
"icon-chevron-right","icon-chevron-small-down","icon-chevron-small-left","icon-chevron-small-right","icon-chevron-small-up","icon-chevron-thin-down",
"icon-chevron-thin-left","icon-chevron-thin-right","icon-chevron-thin-up","icon-chevron-up","icon-chevron-with-circle-down","icon-chevron-with-circle-left",
"icon-chevron-with-circle-right","icon-chevron-with-circle-up","icon-cloud2","icon-controller-fast-forward","icon-controller-jump-to-start",
"icon-controller-next","icon-controller-paus","icon-controller-play","icon-controller-record","icon-controller-stop","icon-controller-volume",
"icon-dot-single","icon-dots-three-horizontal","icon-dots-three-vertical","icon-dots-two-horizontal","icon-dots-two-vertical","icon-download2",
"icon-emoji-flirt","icon-flow-branch","icon-flow-cascade","icon-flow-line","icon-flow-parallel","icon-flow-tree","icon-install","icon-layers2",
"icon-open-book","icon-resize-100","icon-resize-full-screen","icon-save","icon-select-arrows","icon-sound-mute","icon-sound","icon-trash2",
"icon-triangle-down","icon-triangle-left","icon-triangle-right","icon-triangle-up","icon-uninstall","icon-upload-to-cloud","icon-upload2",
"icon-add-user","icon-address","icon-adjust","icon-air","icon-aircraft-landing","icon-aircraft-take-off","icon-aircraft","icon-align-bottom",
"icon-align-horizontal-middle","icon-align-left2","icon-align-right2","icon-align-top","icon-align-vertical-middle","icon-archive2","icon-area-graph",
"icon-attachment","icon-awareness-ribbon","icon-back-in-time","icon-back","icon-bar-graph2","icon-battery2","icon-beamed-note","icon-bell2","icon-blackboard",
"icon-block","icon-book2","icon-bowl","icon-box2","icon-briefcase2","icon-browser","icon-brush","icon-bucket","icon-cake","icon-calculator","icon-calendar",
"icon-camera2","icon-ccw","icon-chat","icon-check2","icon-circle-with-cross","icon-circle-with-minus","icon-circle-with-plus","icon-circle","icon-circular-graph",
"icon-clapperboard","icon-clipboard2","icon-clock2","icon-code","icon-cog2","icon-colours","icon-compass","icon-copy","icon-credit-card","icon-credit","icon-cross2",
"icon-cup","icon-cw","icon-cycle","icon-database","icon-dial-pad","icon-direction","icon-document","icon-documents","icon-drink","icon-drive","icon-drop2","icon-edit",
"icon-email","icon-emoji-happy","icon-emoji-neutral","icon-emoji-sad","icon-erase","icon-eraser","icon-export","icon-eye2","icon-feather","icon-flag2","icon-flash",
"icon-flashlight","icon-flat-brush","icon-folder-images","icon-folder-music","icon-folder-video","icon-folder2","icon-forward","icon-funnel","icon-game-controller",
"icon-gauge","icon-globe2","icon-graduation-cap","icon-grid2","icon-hair-cross","icon-hand","icon-heart-outlined","icon-heart2","icon-help-with-circle","icon-help2",
"icon-home","icon-hour-glass","icon-image-inverted","icon-image2","icon-images","icon-inbox2","icon-infinity","icon-info-with-circle","icon-info","icon-key","icon-keyboard",
"icon-lab-flask","icon-landline","icon-language","icon-laptop","icon-leaf","icon-level-down","icon-level-up","icon-lifebuoy","icon-light-bulb","icon-light-down",
"icon-light-up","icon-line-graph","icon-link2","icon-list","icon-location-pin","icon-location2","icon-lock-open","icon-lock2","icon-log-out","icon-login","icon-loop",
"icon-magnet","icon-magnifying-glass","icon-mail2","icon-man","icon-map2","icon-mask","icon-medal","icon-megaphone","icon-menu2","icon-message","icon-mic","icon-minus2",
"icon-mobile","icon-modern-mic","icon-moon2","icon-mouse","icon-music","icon-network","icon-new-message","icon-new","icon-news","icon-note","icon-notification",
"icon-old-mobile","icon-old-phone","icon-palette","icon-paper-plane","icon-pencil","icon-phone","icon-pie-chart","icon-pin","icon-plus2","icon-popup","icon-power-plug",
"icon-price-ribbon","icon-price-tag","icon-print","icon-progress-empty","icon-progress-full","icon-progress-one","icon-progress-two","icon-publish","icon-quote","icon-radio",
"icon-reply-all","icon-reply2","icon-retweet","icon-rocket","icon-round-brush","icon-rss","icon-ruler","icon-scissors","icon-share-alternitive","icon-share2","icon-shareable",
"icon-shield","icon-shop","icon-shopping-bag","icon-shopping-basket","icon-shopping-cart","icon-shuffle2","icon-signal2","icon-sound-mix","icon-sports-club","icon-spreadsheet",
"icon-squared-cross","icon-squared-minus","icon-squared-plus","icon-star-outlined","icon-star2","icon-stopwatch","icon-suitcase","icon-swap","icon-sweden","icon-switch","icon-tablet",
"icon-tag2","icon-text-document-inverted","icon-text-document","icon-text","icon-thermometer2","icon-thumbs-down","icon-thumbs-up","icon-thunder-cloud","icon-ticket","icon-time-slot",
"icon-tools","icon-traffic-cone","icon-tree","icon-trophy","icon-tv","icon-typing","icon-unread","icon-untag","icon-user","icon-users","icon-v-card","icon-video2","icon-vinyl","icon-voicemail",
"icon-wallet","icon-water","icon-px-with-circle","icon-px","icon-basecamp","icon-behance","icon-creative-cloud","icon-dropbox","icon-evernote","icon-flattr","icon-foursquare","icon-google-drive",
"icon-google-hangouts","icon-grooveshark","icon-icloud","icon-mixi","icon-onedrive","icon-paypal","icon-picasa","icon-qq","icon-rdio-with-circle","icon-renren","icon-scribd","icon-sina-weibo",
"icon-skype-with-circle","icon-skype","icon-slideshare","icon-smashing","icon-soundcloud","icon-spotify-with-circle","icon-spotify","icon-swarm","icon-vine-with-circle","icon-vine","icon-vk-alternitive",
"icon-vk-with-circle","icon-vk","icon-xing-with-circle","icon-xing","icon-yelp","icon-dribbble-with-circle","icon-dribbble","icon-facebook-with-circle","icon-facebook","icon-flickr-with-circle",
"icon-flickr","icon-github-with-circle","icon-github","icon-google-with-circle","icon-google","icon-instagram-with-circle","icon-instagram","icon-lastfm-with-circle","icon-lastfm","icon-linkedin-with-circle",
"icon-linkedin","icon-pinterest-with-circle","icon-pinterest","icon-rdio","icon-stumbleupon-with-circle","icon-stumbleupon","icon-tumblr-with-circle","icon-tumblr","icon-twitter-with-circle","icon-twitter",
"icon-vimeo-with-circle","icon-vimeo","icon-youtube-with-circle","icon-youtube"];

arr_icons.forEach(function(part, index) {
  if(document.getElementById('icon-list') !== null) {
    document.getElementById('icon-list').innerHTML +=
    "<a class='icon "+arr_icons[index]+"' id='"+arr_icons[index]+"' onclick='selectIcon("+JSON.stringify(arr_icons[index])+")' style='font-size:20px;margin-left:2px;display:inline-block;cursor:pointer'></a>";
  }

  if(document.getElementById('edit-icon-list') !== null) {
    document.getElementById('edit-icon-list').innerHTML +=
    "<a class='icon "+arr_icons[index]+"' id='"+arr_icons[index]+"' onclick='selectIcon("+JSON.stringify(arr_icons[index])+")' style='font-size:20px;margin-left:2px;display:inline-block;cursor:pointer'></a>";
  } 
});
  
$('#editProdukModal').on('shown.bs.modal', function (event) {
  var button = $(event.relatedTarget);

  var id = button.data('id');
  var product_name = button.data('product_name');
  var sub_product_id = button.data('sub_product_id');

  console.log(product_name);

  console.log(sub_product_id);


  var modal = $(this);

  modal.find('.modal-body #name').val(product_name);
  modal.find('.modal-body #product_category').val(sub_product_id);
  modal.find('.modal-footer #sub_cat_id').val(id);

})


$('#deleteProdukModal').on('shown.bs.modal', function (event) {
  var button = $(event.relatedTarget);

  console.log("sdsad");

  var id = button.data('id');
  var modal = $(this);
  
  modal.find('.modal-footer #_del_sub_cat_id').val(id);

})

$('#editSubCategoryModal').on('shown.bs.modal', function (event) {
  var button = $(event.relatedTarget);

  var id = button.data('id');
  var name = button.data('name');
  var product_id = button.data('product_id');

  var modal = $(this);

  modal.find('.modal-body #_edit_name').val(name);
  modal.find('.modal-body #_edit_category').val(product_id);
  modal.find('.modal-footer #cat_id').val(id);

})


$('#deleteSubCategoryModal').on('shown.bs.modal', function (event) {
  var button = $(event.relatedTarget);

  var id = button.data('id');
  var modal = $(this);
  
  modal.find('.modal-footer #_del_cat_id').val(id);

})

$('#editCategoryModal').on('shown.bs.modal', function (event) {
  var button = $(event.relatedTarget);

  var id = button.data('id');
  var name = button.data('name');
  var icon = button.data('icon');

  var modal = $(this);

  modal.find('.modal-body #_edit_name').val(name);
  modal.find('.modal-body #edit_selected_product_icon').val(icon);
  modal.find('.modal-footer #_edit_product_id').val(id);
  modal.find('.modal-footer #_edit_product_icon').val(icon);

})


$('#deleteCategoryModal').on('shown.bs.modal', function (event) {
  var button = $(event.relatedTarget);

  var id = button.data('id');
  var modal = $(this);
  
  modal.find('.modal-footer #_del_product_id').val(id);

})

$('#deleteItemModal').on('shown.bs.modal', function (event) {
  var button = $(event.relatedTarget);

  var id = button.data('id');
  var modal = $(this);
  
  modal.find('.modal-footer #_del_item_id').val(id);

})