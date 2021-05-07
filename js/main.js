// Variables
const bills = document.querySelectorAll('.bill');
var nbc = document.getElementById('new-bill-container');
var delete_bill = false;

// Set bill as paid or unpaid.
for (var bill of bills) {
    bill.addEventListener('click', function(e) {
        let bill = document.getElementById(this.id);
        let td_bill = bill.querySelectorAll('td');
        for (let tdb of td_bill) {
            if (delete_bill) {
                bill.parentNode.removeChild(bill);
                //console.log(bill);
                delete_bill = false;
                var tds = document.querySelectorAll('#bill-container table tr td');
                for (var td of tds) {
                    td.classList.remove('shake-me');
                }
                return;
            }
            if (!tdb.classList.contains('paid')) {
                tdb.className = 'paid';
            }
            else {
                tdb.className = 'unpaid';
            }
        }
    });
}

// Set delete_bill to true.
function setDelete() {
    // Press delete again to cancel delete.
    if (delete_bill) {
        delete_bill = false;
        var tds = document.querySelectorAll('#bill-container table tr td');
        for (var td of tds) {
            td.classList.remove('shake-me');
        }
        return;
    }
    delete_bill = true;
    var tds = document.querySelectorAll('#bill-container table tr td');
    for (var td of tds) {
        td.classList.add('shake-me');
    }
}

// Create new bill.
function showNewBill() {
    nbc.style.display = 'flex';
}
function hideNewBill() {
    nbc.style.display = 'none';
}