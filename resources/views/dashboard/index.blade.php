@extends('dashboard.layouts.main')

@section('container')
    <div class="container px-4 mx-auto mt-3">
        <h1 class="text-2xl font-medium">Welcome Back, {{ auth()->user()->name }}</h1>
    </div>

    <div class="container px-4 mx-auto mt-3">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="border-2 border-teal-100 shadow-lg shadow-teal-500/30 rounded-xl p-3">
                <h4 class="text-xl font-semibold text-orange-500">Booked</h4>
                <h4 class="text-2xl">{{ $booked }}</h4>
            </div>
            <div class="border-2 border-teal-100 shadow-lg shadow-teal-500/30 rounded-xl p-3">
                <h4 class="text-xl font-semibold text-orange-500">Waiting</h4>
                <h4 class="text-2xl">{{ $waiting }}</h4>
            </div>
            <div class="border-2 border-teal-100 shadow-lg shadow-teal-500/30 rounded-xl p-3">
                <h4 class="text-xl font-semibold text-orange-500">Available</h4>
                <h4 class="text-2xl">{{ $available }}</h4>
            </div>
        </div>
    </div>

    <div class="container px-4 mx-auto mt-3">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="border-2 border-teal-100 shadow-lg shadow-teal-500/30 rounded-xl p-3">
                <canvas id="myChart"></canvas>
            </div>
            <div class="border-2 border-teal-100 shadow-lg shadow-teal-500/30 rounded-xl p-3">
                <canvas id="myChart1"></canvas>
            </div>

        </div>
    </div>

    <div class="container px-4 mx-auto mt-3">
        <div class="grid grid-cols-2 gap-4">
            <select name="tahun" id="tahun" class="p-2 border-2 border-teal-100 rounded-full w-full my-3">
                <option value="2014">2014</option>
            </select>
            <select name="bulan" id="bulan" class="p-2 border-2 border-teal-100 rounded-full w-full my-3">
                <option value="januari">januari</option>
            </select>
        </div>

        <div class="grid grid-cols-1  gap-4">
            <div class="border-2 border-teal-100 shadow-lg shadow-teal-500/30 rounded-xl p-3">
                <canvas id="myChart2"></canvas>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script>
        const ctx = document.getElementById('myChart');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {

            let dorm;
            let report;
            let expense;

            $.ajax({
                url: "/dashboard/getdorm",
                method: 'get',
                success: function(response) {
                    if (dorm) {
                        dorm.destroy();
                    }
                    console.log(response);

                    if (response.length > 0) {
                        let labels = [];
                        let data = [];

                        response.forEach(dorm => {
                            labels.push(dorm
                                .nama); // Assuming 'name' is the property for dorm name
                            data.push(
                                dorm.rooms_count
                            ); // 'booked_rooms_count' from the Eloquent query
                        });

                        const ctx = document.getElementById('myChart').getContext('2d');
                        dorm = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Booked Rooms',
                                    data: data,
                                    borderColor: '#F97316',
                                    backgroundColor: '#F97316',
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                },
                                plugins: {
                                    subtitle: {
                                        display: true,
                                        text: 'Number of Booked Rooms per Dormitory'
                                    }
                                }
                            }
                        });
                    } else {
                        const ctx = document.getElementById('myChart').getContext('2d');
                        dorm = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: [],
                                datasets: [{
                                    label: 'Booked Rooms',
                                    data: [],
                                    borderColor: '#F97316',
                                    backgroundColor: '#F97316',
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                },
                                plugins: {
                                    subtitle: {
                                        display: true,
                                        text: 'Number of Booked Rooms per Dormitory'
                                    }
                                }
                            }
                        });
                    }
                }
            });

            $.ajax({
                url: "/dashboard/getexpense",
                method: 'get',
                success: function(response) {
                    if (expense) {
                        expense.destroy();
                    }
                    console.log(response);

                    if (response.length > 0) {
                        let labels = [];
                        let data = [];

                        response.forEach(expense => {
                            labels.push(
                                `${expense.month}/${expense.year}`
                                ); // Assuming 'name' is the property for dorm name
                            data.push(expense
                                .total_nominal

                            ); // 'booked_rooms_count' from the Eloquent query
                        });
                        console.log(data);

                        const ctx1 = document.getElementById('myChart1').getContext('2d');
                        expense = new Chart(ctx1, {
                            type: 'line',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Booked Rooms',
                                    data: data,
                                    borderColor: '#F97316',
                                    backgroundColor: '#F97316',
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                },
                                plugins: {
                                    subtitle: {
                                        display: true,
                                        text: 'Number of Booked Rooms per Dormitory'
                                    }
                                }
                            }
                        });
                    } else {
                        const ctx = document.getElementById('myChart1').getContext('2d');
                        dorm = new Chart(ctx1, {
                            type: 'line',
                            data: {
                                labels: [],
                                datasets: [{
                                    label: 'Booked Rooms',
                                    data: [],
                                    borderColor: '#F97316',
                                    backgroundColor: '#F97316',
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                },
                                plugins: {
                                    subtitle: {
                                        display: true,
                                        text: 'Number of Booked Rooms per Dormitory'
                                    }
                                }
                            }
                        });
                    }
                }
            });


            // const ctx1 = document.getElementById('myChart1');

            // new Chart(ctx1, {
            //     type: 'line',
            //     data: {
            //         labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            //         datasets: [{
            //             label: '# of Votes',
            //             data: [12, 19, 3, 5, 2, 3],
            //             backgroundColor: '#F97316',
            //             borderColor: '#F97316',
            //             borderWidth: 1
            //         }]
            //     },
            //     options: {
            //         scales: {
            //             y: {
            //                 beginAtZero: true
            //             }
            //         },
            //         plugins: {
            //             subtitle: {
            //                 display: true,
            //                 text: 'Expense'
            //             }
            //         }
            //     }
            // });

            const ctx2 = document.getElementById('myChart2');


            new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        borderColor: '#F97316',
                        backgroundColor: '#F97316',
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
    </script>
@endsection
