import Chart from 'chart.js';
import axios from 'axios';

let orders = [];

const restId = document.getElementById('restaurant_id').value;

axios.get(`http://127.0.0.1:8000/api/get-statistics?id=${restId}`)
    .then(response => {
        orders = response.data;
    })
    .catch(error => {
        console.log(error);
    });   

setTimeout(() => {


    // Logica Scontrino media annuale
    let media = [
        {year: '2016', total: 0, orderNum: 0, calc: 0},
        {year: '2017', total: 0, orderNum: 0, calc: 0},
        {year: '2018', total: 0, orderNum: 0, calc: 0},
        {year: '2019', total: 0, orderNum: 0, calc: 0},
        {year: '2020', total: 0, orderNum: 0, calc: 0},
        {year: '2021', total: 0, orderNum: 0, calc: 0},
    ];
    orders.forEach(order => {
        let index = 0;
        for ( let i = 0; i < media.length; i++) {

            if (media[i].year == order.created_at.slice(0, 4)) {
                index = i;
                break;
            }
        }   
        
        media[index].total += parseInt(order.amount);
        media[index].orderNum++;
        
    });

    media.forEach(element => {
        element.calc = element.total / element.orderNum;
    });


    // Statistica - SCONTRINO MEDIA PER ANNO
    var ctxMediaAnno = document.getElementById('mediaAnno');
    var mediaAnno = new Chart(ctxMediaAnno, {type: 'bar',
        data: {
            labels: ['2016', '2017', '2018', '2019', '2020', '2021'],
            datasets: [{
                label: 'Scontrino medio Annuo',
                data: [media[0].calc, media[1].calc, media[2].calc, media[3].calc, media[4].calc, media[5].calc],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    //Logica Scontrino media mensile, anno in corso
    let mediaMonth = [
        {month: '01', total: 0, orderNum: 0, calc: 0},
        {month: '02', total: 0, orderNum: 0, calc: 0},
        {month: '03', total: 0, orderNum: 0, calc: 0},
        {month: '04', total: 0, orderNum: 0, calc: 0},
        {month: '05', total: 0, orderNum: 0, calc: 0},
        {month: '06', total: 0, orderNum: 0, calc: 0},
        {month: '07', total: 0, orderNum: 0, calc: 0},
        {month: '08', total: 0, orderNum: 0, calc: 0},
        {month: '09', total: 0, orderNum: 0, calc: 0},
        {month: '10', total: 0, orderNum: 0, calc: 0},
        {month: '11', total: 0, orderNum: 0, calc: 0},
        {month: '12', total: 0, orderNum: 0, calc: 0},
    ];
    let currentYear = new Date().getFullYear();
    orders.forEach(order => {
        if (order.created_at.slice(0, 4) == currentYear) {
            for ( let i = 0; i < mediaMonth.length; i++) {
                if (mediaMonth[i].month == order.created_at.slice(5, 7)) {
                    mediaMonth[i].total += parseInt(order.amount);
                    mediaMonth[i].orderNum++;
                    break;
                }
            }
        }      
        
    });

    // console.log(mediaMonth);
    mediaMonth.forEach(element => {
        element.calc = element.total / element.orderNum;
    });

    // Statistica - SCONTRINO MEDIA PER MESE
    var ctxMediaMese = document.getElementById('mediaMese');
    var mediaMese = new Chart(ctxMediaMese, {type: 'bar',
        data: {
            labels: ['Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre',],
            datasets: [{
                label: 'Scontrino Medio Mensile',
                data: [mediaMonth[0].calc, mediaMonth[1].calc, mediaMonth[2].calc, mediaMonth[3].calc, mediaMonth[4].calc, mediaMonth[5].calc, mediaMonth[6].calc, mediaMonth[7].calc, mediaMonth[8].calc, mediaMonth[9].calc, mediaMonth[10].calc, mediaMonth[11].calc],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    // Statistica - NUMERO ORDINI MENSILI
    var ctxOrdiniMensili = document.getElementById('ordiniMensili');
    var ordiniMensili = new Chart(ctxOrdiniMensili, {type: 'bar',
        data: {
            labels: ['Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre',],
            datasets: [{
                label: 'Numero Ordini Mensili',
                data: [mediaMonth[0].orderNum, mediaMonth[1].orderNum, mediaMonth[2].orderNum, mediaMonth[3].orderNum, mediaMonth[4].orderNum, mediaMonth[5].orderNum, mediaMonth[6].orderNum, mediaMonth[7].orderNum, mediaMonth[8].orderNum, mediaMonth[9].orderNum, mediaMonth[10].orderNum, mediaMonth[11].orderNum],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    // Statistica - NUMERO ORDINI ANNUALI
    var ctxOrdiniAnnuali = document.getElementById('ordiniAnnuali');
    var ordiniAnnuali = new Chart(ctxOrdiniAnnuali, {type: 'bar',
        data: {
            labels: ['2016', '2017', '2018', '2019', '2020', '2021'],
            datasets: [{
                label: 'Numero Ordini Annuali',
                data: [media[0].orderNum, media[1].orderNum, media[2].orderNum, media[3].orderNum, media[4].orderNum, media[5].orderNum],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    


}, 2000);



