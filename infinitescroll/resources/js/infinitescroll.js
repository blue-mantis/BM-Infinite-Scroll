$(function() {

    var loadingMsg = (typeof loadingMessage != "undefined") ? loadingMessage : "Loading more posts...";
    var finishedMsg = (typeof finishedMessage != "undefined") ? finishedMessage : "There are no more items to load";

    $(containerSelector).infinitescroll({
        loading: {
            finished: undefined,
            finishedMsg: finishedMsg,
                        img: loadingImage,
            msg: null,
            msgText: loadingMsg,
            selector: null,
            speed: "fast",
            start: undefined
        },
        navSelector  : "div.pagination",
        nextSelector : "div.pagination a:first",
        itemSelector : containerSelector + ">" + itemSelector,
        maxPage      : totalNumOfPages,
    });
});
