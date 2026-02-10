<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Nami Soft Task </title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-4">
        <h1 class="mb-4">Nami Soft Task </h1>

        <!-- Controls -->
        <div class="row g-3 align-items-center mb-4">
            <div class="col-sm-6 col-md-4">
                <label for="tableSelect" class="form-label">Choose Project to display</label>
                <select id="tableSelect" class="form-select" aria-label="Select table">
                    <option value="" selected>Choose</option>
                    <option value="all" selected>All Projects</option>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }} </option>
                    @endforeach
                </select>
            </div>

            <div class="col-auto">
                <label class="form-label d-block mb-1">&nbsp;</label>
                <button id="applyBtn" class="btn btn-primary">Apply</button>
            </div>

            <div class="col-12 col-md-4 align-self-end">
                <small class="text-muted">Tip: choose a table and click <strong>Apply</strong> to show it.</small>
            </div>
        </div>

        <!-- Tables -->
        <div id="tablesContainer" class="row gy-4">
            <!-- Table 1 -->
            <div id="t1" class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <strong>Table 1 — Employees</strong>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>salary</th>
                                        <th>hour cost</th>
                                    </tr>
                                </thead>
                                <tbody id="employeesTableBody">
                                    <tr>
                                        <td>1</td>
                                        <td>Alice Johnson</td>
                                        <td>1000</td>
                                        <td>10</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table 2 -->
            <div id="t2" class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <strong>Table 2 — Projects</strong>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Project ID</th>
                                        <th>Project Name</th>
                                        <th>start data</th>
                                        <th>end date </th>
                                        <th>total days </th>
                                        <th>total employees </th>
                                        <th>total project cost </th>
                                    </tr>
                                </thead>
                                <tbody id="projectsTableBody">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table 3 -->
            <div id="t3" class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <strong>Table 3 — Time Logs</strong>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-sm mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Date</th>
                                        <th>Employee</th>
                                        <th>Project</th>
                                        <th>Hours</th>
                                        <th>medul</th>
                                    </tr>
                                </thead>
                                <tbody id="timeLogsTableBody">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div id="t4" class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <strong>Table 4 — moduls </strong>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-sm mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Employee</th>
                                        <th>modul name</th>
                                        <th>Project</th>
                                        <th>Hours</th>
                                    </tr>
                                </thead>
                                <tbody id="modulsTableBody">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div id="t5" class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <strong>Table 4 — logs </strong>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-sm mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Employee</th>
                                        <th>2025-10-01</th>
                                        <th>2025-10-02</th>
                                        <th>2025-10-05</th>
                                        <th>2025-10-07</th>
                                        <th>2025-10-20</th>
                                        <th>2025-10-30</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Alice</td>
                                        <td>6</td>
                                        <td>5</td>
                                        <td>3</td>
                                        <td>5</td>
                                        <td>1</td>
                                        <td>6</td>
                                    </tr>
                                    <tr>
                                        <td>Bob</td>
                                        <td>3</td>
                                        <td>1</td>
                                        <td>3</td>
                                        <td>5</td>
                                        <td>2</td>
                                        <td>8</td>
                                    </tr>
                                    <tr>
                                        <td>Carol</td>
                                        <td>3</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>7</td>
                                        <td>2</td>
                                        <td>5</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!-- small footer -->
        <footer class="mt-4">
            <small class="text-muted">Example layout — Bootstrap 5</small>
        </footer>
    </div>

    <!-- Bootstrap JS (requires Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        $('#applyBtn').click(function() {
            const projectId = $('#tableSelect').val();

            axios.get('{{ route('projects.filter') }}', {
                params: {
                    project_id: projectId
                }
            }).then(function(response) {
                /** employees */
                let employeesHtml = '';
                response.data.employees.forEach(emp => {
                    employeesHtml += `
                <tr>
                    <td>${emp.id}</td>
                    <td>${emp.name}</td>
                    <td>${emp.salary}</td>
                    <td>${emp.hour_cost}</td>
                </tr>
                    `
                });

                $('#employeesTableBody').html(employeesHtml);

                /** projects */
                let projectsHtml = '';
                response.data.projects.forEach(project => {
                    projectsHtml += `
                <tr>
                    <td>${project.id}</td>
                    <td>${project.name}</td>
                    <td>${project.start_date}</td>
                    <td>${project.end_date}</td>
                    <td>${project.total_days}</td>
                    <td>${project.total_employees}</td>
                    <td>${project.total_cost}</td>
                </tr>
                    `
                });

                $('#projectsTableBody').html(projectsHtml);

                /** time logs */
                let timeLogsHtml = '';
                response.data.timeLogs.forEach(log => {
                    timeLogsHtml += `
                <tr>
                    <td>${log.date}</td>
                    <td>${log.employee}</td>
                    <td>${log.project}</td>
                    <td>${log.hours}</td>
                    <td>${log.modul}</td>
                </tr>
                    `
                });

                $('#timeLogsTableBody').html(timeLogsHtml);

                /** moduls */
                let modulsHtml = '';
                response.data.moduls.forEach(modul => {
                    modulsHtml += `
                <tr>
                    <td>${modul.emp_name}</td>
                    <td>${modul.name}</td>
                    <td>${modul.project_name}</td>
                    <td>${modul.hours}</td>
                </tr>
                    `
                });

                $('#modulsTableBody').html(modulsHtml);

            }).catch(function(error) {
                console.log(error)
            });

        })
    </script>
</body>

</html>
