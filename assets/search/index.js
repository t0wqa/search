var withAdditionalFiltersButton = document.querySelector('#with-additional-filters');
var form = document.querySelector('.search-bar__form');

var selectAuthor = document.querySelector('#select-author');
var inputDateFrom = document.querySelector('#input-date-from');
var inputDateTo = document.querySelector('#input-date-to');

withAdditionalFiltersButton.checked = false;
selectAuthor.value = 0;
inputDateFrom.value = null;
inputDateTo.value = null;

withAdditionalFiltersButton.addEventListener('change', function(event) {
    document.querySelector('.search-bar__additional_inputs').style.display = event.target.checked ? 'block' : 'none';

    if (event.target.checked) {
        var inputHiddenAuthor = createHiddenElement('author', 'input-hidden-author', selectAuthor);
        var inputHiddenDateFrom = createHiddenElement('date-from', 'input-hidden-date-from', inputDateFrom);
        var inputHiddenDateTo = createHiddenElement('date-to', 'input-hidden-date-to', inputDateTo);

        form.append(inputHiddenAuthor);
        form.append(inputHiddenDateFrom);
        form.append(inputHiddenDateTo);

    } else {
        document.querySelector('#input-hidden-author').remove();
        document.querySelector('#input-hidden-date-from').remove();
        document.querySelector('#input-hidden-date-to').remove();
    }
});

form.addEventListener('submit', function(event) {
    event.preventDefault();

    form.submit();
});

function createHiddenElement(name, id, subscribedElement) {
    var element = document.createElement('input');

    element.type = 'hidden';
    element.name = name;
    element.id = id;

    subscribedElement.addEventListener('change', function(e) {
        if (e.target.type === 'date') {
            element.value = new Date(e.target.value).getTime() / 1000;
        } else {
            element.value = e.target.value;
        }
    });

    return element;
}
