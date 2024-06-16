function createCalendar(elem, year, month) {

    let mon = month - 1; // in JS i mesi sono 0..11, non 1..12
    let d = new Date(year, mon);

    let table = '<table ><tr><th>MO</th><th>TU</th><th>WE</th><th>TH</th><th>FR</th><th>SA</th><th>SU</th></tr><tr>';

    // gli spazi per la prima fila
    // da lunedì fino al primo giorno del mese
    // * * * 1  2  3  4
    for (let i = 0; i < getDay(d); i++) {
      table += '<td></td>';
    }

    // <td> con le date
    while (d.getMonth() == mon) {
      table += '<td>' + d.getDate() + '</td>';

      if (getDay(d) % 7 == 6) { // domenica, ultimo giorno della settimana - a capo
        table += '</tr><tr>';
      }

      d.setDate(d.getDate() + 1);
    }

    // aggiungi gli spazi per l'ultima fila dopo gli ultimi giorni della settimana
    // 29 30 31 * * * *
    if (getDay(d) != 0) {
      for (let i = getDay(d); i < 7; i++) {
        table += '<td></td>';
      }
    }

    // Chiudi la tabella
    table += '</tr></table>';

    elem.innerHTML = table;
  }

  function getDay(date) { // ottieni il giorno da 0 (lunedì) a 6 (domenica)
    let day = date.getDay();
    if (day == 0) day = 7; // rendi domenica (0) l'ultimo giorno
    return day - 1;
  }
  createCalendar(calendar, 2024, 6);