@extends("kernel.template.dashboard")

@section("styles")
    @parent
    <link rel="stylesheet/less" type="text/css" href="{{ asset("css/contents/dashboard/components/ladder.less") }}" />
    <link rel="stylesheet/less" type="text/css" href="{{ asset("css/librairies/datatables.less") }}" />
@endsection

@section("scripts")
    @parent
    <script src="{{asset("js/assets/waves.js")}}"></script>
    <script src="{{asset("js/assets/canvas.js")}}"></script>
    <script src="{{asset("js/contents/dashboard/components/ladder.js")}}"></script>
    <script>

        drawDisk({
            canvas: "#canvas",
            preset: 3,
            colored: -1
        });
        drawLadder({
            canvas: "#canvas2",
            chips: 4
        });

        /*$(window).on("scroll", () => {
            var windowsTop = $(window).scrollTop();
            var documentHeight = $(document).height();
            var windowsHeight = $(window).height();
            var percentage = (windowsTop/(documentHeight-windowsHeight))*100;

            var spanHeight = $("#background span.top").offset().top + $("#background span.top").height();
            console.log(windowsTop > spanHeight)

            //$("#background span.top").css("height", (percentage+30) + "rem");
        });*/

        function retrieveProperty(data, parameters) {
            while (parameters.includes(".")) {
                var path = parameters.split(".")[0];
                data = data[path];
                parameters = parameters.substring(path.length + 1);
            }

            return data[parameters];
        }

        AjaxRequest({
            type: "GET",
            url: "http://localhost:8080/ladder/default?identifier=h0d0f0z0l0",
            onSuccess: (data, status, result) => {
                $("*[data-field]").each((i, element) => {
                    var field = $(element).data("field");
                    var link = $(element).data("type") === "link";

                    var text = retrieveProperty(data, field);

                    if (!link) {
                        $(element).text(text);
                    } else {
                        $(element).attr("href", text);
                        $(element).text("click-me !");
                    }
                });

            },
            onError(result, status, error) {
                alert("ajax error");
            }
        });


        AjaxRequest({
            type: "GET",
            url: "http://localhost:8080/ladder/chips?identifier=h0d0f0z0l0",
            onSuccess: (data, status, result) => {
                $("*[data-field]").each((i, element) => {
                    var field = $(element).data("field");
                    var link = $(element).data("type") === "link";

                    var text = retrieveProperty(data, field);

                    if (!link) {
                        $(element).text(text);
                    } else {
                        $(element).attr("href", text);
                        $(element).text("click-me !");
                    }
                });

            },
            onError(result, status, error) {
                alert("ajax error");
            }
        });

    </script>
    <script>
        $("form").on("submit", (event) => {
            event.preventDefault();
            var getUrl = window.location;
            var baseUrl = getUrl.protocol + "//" + getUrl.host;

            window.location.replace(baseUrl + "/" + "ladders" + "/" + $("input#content").val())
        })
    </script>
    <script>
        $("input[type='checkbox']").on("change", function() {
            $("div#" + $(this).attr("id")).toggle();
        });
    </script>
@endsection

@section("background")
    <div id="background">
        <span class="top" data-height="30rem"></span>
        <canvas id="waves" height="200" width="1200"></canvas>
    </div>
@endsection

@section("section")
    <div id="foreground">
        <div class="title">
            <div class="top">
                <div>
                    <h1>ALICE MFT</h1>
                    <p>A Large Ion Collider Experiment</p>
                </div>
                <form class="collapsed">
                    <div class="field">
                        <input id="content" type="search" name="content" placeholder="Research a specific ladder" autocomplete="off" required>
                    </div>
                    <div class="field">
                        <button type="submit" class="icon search"></button>
                    </div>
                </form>
            </div>
            <div class="options">
                <hr>
                <form class="stacked">
                    <div class="field">
                        <input type="checkbox" name="primary" id="primary" checked>
                        <label for="primary">Primary area</label>
                    </div>
                    <div class="field">
                        <input type="checkbox" name="disk" id="disk" checked>
                        <label for="disk">Disk table</label>
                    </div>
                    <div class="field">
                        <input type="checkbox" name="chips" id="chips" checked>
                        <label for="chips">Chips table</label>
                    </div>
                    <div class="field">
                        <input type="checkbox" name="cooling" id="cooling" checked>
                        <label for="cooling">Cooling table</label>
                    </div>
                    <div class="field">
                        <input type="checkbox" name="power" id="power" checked>
                        <label for="power">Power table</label>
                    </div>
                    <div class="field">
                        <input type="checkbox" name="readout" id="readout" checked>
                        <label for="readout">Readout table</label>
                    </div>
                </form>
            </div>
            <div class="interactions">
                <i class="button-icon"></i>
            </div>
        </div>

        <div class="data">
            <div id="primary" class="top">
                <div class="scheme">
                    <div>
                        <canvas id="canvas" height="500" width="1000"></canvas>
                        <canvas id="canvas2" height="75" width="1000"></canvas>
                    </div>
                </div>
                <div class="infos">
                    <table>
                        <tbody>
                            <tr>
                                <td>Ladder</td>
                                <td data-field="ladder.ladderId">?</td>
                            </tr>
                            <tr>
                                <td>Production name</td>
                                <td data-field="ladder.name">?</td>
                            </tr>
                            <tr>
                                <td>Traveller</td>
                                <td><a data-type="link" data-field="ladder.travLink" href="?">?</a></td>
                            </tr>
                            <tr>
                                <td>Cernbox dir</td>
                                <td><a data-type="link" data-field="ladder.cernboxLink" href="?">?</a></td>
                            </tr>
                            <tr>
                                <td>Mechanical grade</td>
                                <td data-field="ladder.mechGrade">?</td>
                            </tr>
                            <tr>
                                <td>Qualification grade</td>
                                <td data-field="ladder.qaGrade">?</td>
                            </tr>
                            <tr>
                                <td>FPC</td>
                                <td data-field="fpc.fpcId">?</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="table" id="disk">
                <table class="horizontal">
                    <thead>
                        <tr>
                            <th>Cone</th>
                            <th>Disk</th>
                            <th>Disk face</th>
                            <th>Disk zone</th>
                            <th>PCB</th>
                            <th>Cernbox dir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-field="disk.coneId">?</td>
                            <td data-field="disk.diskId">?</td>
                            <td data-field="diskFace.diskFaceId">?</td>
                            <td data-field="zone.zoneId">?</td>
                            <td data-field="pcb.pcbId">?</td>
                            <td><a data-type="link" data-field="disk.docLink" href="?">?</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="table" id="chips">
                <table class="datatable horizontal">
                    <thead>
                        <tr>
                            <th>Chip ID</th>
                            <th>Production name</th>
                            <th>Qualification grade</th>
                            <th>Qualification doc</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                        </tr>
                        <tr>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                        </tr>
                        <tr>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                        </tr>
                        <tr>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="table" id="cooling">
                <table class="datatable horizontal">
                    <thead>
                        <tr>
                            <th>Heat exchanger</th>
                            <th>Cone IN line</th>
                            <th>Cone OUT line</th>
                            <th>Barrel IN line</th>
                            <th>Barrel OUT line</th>
                            <th>Miniframe IN line</th>
                            <th>Miniframe OUT line</th>
                            <th>Cavern IN line</th>
                            <th>Cavern OUT line</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                        </tr>
                        <tr>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                        </tr>
                        <tr>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                        </tr>
                        <tr>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="table" id="power">
                <table class="datatable horizontal">
                    <thead>
                        <tr>
                            <th>ANALOG line</th>
                            <th>DIGITAL line</th>
                            <th>BB lines</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                        </tr>
                        <tr>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                        </tr>
                        <tr>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                        </tr>
                        <tr>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="table" id="readout">
                <table class="datatable horizontal">
                    <thead>
                        <tr>
                            <th>RU</th>
                            <th>DOUT line</th>
                            <th>DOUT fiber</th>
                            <th>CTRL line</th>
                            <th>CTRL fiber</th>
                            <th>CLK line</th>
                            <th>CRU</th>
                            <th>FLP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                        </tr>
                        <tr>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                        </tr>
                        <tr>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                        </tr>
                        <tr>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                            <td>?</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
