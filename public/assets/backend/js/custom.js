$('.select2').select2({
    minimumResultsForSearch: Infinity
});

$('.select2-show-search').select2({
    minimumResultsForSearch: ''
});

$('.select2-tag').select2({
    tags: true,
    tokenSeparators: [',', ' ']
});
