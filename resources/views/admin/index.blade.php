@include('admin.header')

<style>
    #chartdiv {
        width: 100%;
        height: 98vh;
    }
</style>
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/maps.js"></script>
<script src="https://cdn.amcharts.com/lib/4/geodata/worldLow.js"></script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
			<div class="row"  >
				<div class="col-xl-3 col-md-6 col-12">
					<div class="box bg-gradient-primary">
						<div class="box-body">
							<div class="d-flex align-items-center justify-content-between">
								<div class=''>
									<h4 class="mt-0 text-white">Total Lead Records</h4>
									<h3 class="fw-500 my-0 text-white">{{count($total_leads)}}</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6 col-12">
					<div class="box">
						<div class="box-body">
							<div class="d-flex align-items-center justify-content-between">
								<div class="w-80 h-80 rounded-circle bg-primary-light fs-40 text-center l-h-80">
									<span class="icon-Equalizer"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
								</div>
								<div class='txtCard'>
									<h4 class="mt-0">Leads</h4>
									<h3 class="fw-500 my-0">{{ $no_of_leads_created }}</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6 col-12">
					<div class="box">
						<div class="box-body">
							<div class="d-flex align-items-center justify-content-between">
								<div class="w-80 h-80 rounded-circle bg-success-light fs-40 text-center l-h-85">
									<span class="icon-Equalizer"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
								</div>
								<div class='txtCard'>
									<h4 class="mt-0">Opportunities</h4>
									<h3 class="fw-500 my-0">{{ $no_of_opportunities_created }}</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6 col-12">
					<div class="box">
						<div class="box-body">
							<div class="d-flex align-items-center justify-content-between">
								<div class="w-80 h-80 rounded-circle bg-danger-light fs-40 text-center l-h-85">
									<span class="icon-Money"><span class="path1"></span><span class="path2"></span></span>
								</div>
								<div class='txtCard'>
									<h4 class="mt-0">Adsearch Account</h4>
									<h3 class="fw-500 my-0">{{count($converted_leads)}}</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-md-6 col-12">
					<div class="box">
						<div class="box-body">
							<div class="d-flex align-items-center justify-content-between">
								<div class="w-80 h-80 rounded-circle bg-warning-light fs-40 text-center l-h-85">
									<span class="icon-User"><span class="path1"></span><span class="path2"></span></span>
								</div>
								<div class='txtCard'>
									<h4 class="mt-0">Adsearch Team Members</h4>
									<h3 class="fw-500 my-0">{{$total_employees_count}}</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
                <div class="col-xl-4 col-md-6 col-12">
					<div class="box">
						<div class="box-body">
							<div class="d-flex align-items-center justify-content-between">
								<div class="w-80 h-80 rounded-circle bg-info-light fs-40 text-center l-h-85">
									<span class="icon-Clock"><span class="path1"></span><span class="path2"></span></span>
								</div>
								<div class='txtCard'>
									<h4 class="mt-0">Today's Clock In</h4>
									<h3 class="fw-500 my-0">{{count($today_clocked_in)}}</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
                <div class="col-xl-4 col-md-6 col-12">
					<div class="box">
						<div class="box-body">
							<div class="d-flex align-items-center justify-content-between">
								<div class="w-80 h-80 rounded-circle bg-info-light fs-40 text-center l-h-85">
									<span class="icon-File"><span class="path1"></span><span class="path2"></span></span>
								</div>
								<div class='txtCard'>
									<h4 class="mt-0">Total Notes/Files</h4>
									<h3 class="fw-500 my-0">{{$total_notes_count . ' Notes'}} / {{$total_files_count . ' Files'}}</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
              <div class="row">
                  <div class="col-xl-6 col-12">
                      <div class="box">
                          <div class="box-header with-border">
                              <h4 class="box-title">Pie Chart</h4>
                          </div>
                          <div class="box-body">
                              <h4 style="    color:  #3596f7;">
                                  Total Leads:  {{count($total_leads)}}
                              </h4>
                              <div id="pie-chart"></div>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-6 col-12">
                      <div class="box">
                          <div class="box-header with-border">
                              <h4 class="box-title">Stacked Column Chart</h4>
                          </div>
                          <div class="box-body">
                              <div id="stacked-column"></div>
                          </div>
                      </div>
                  </div>
              </div>
{{--				<div class="col-xl-8 col-12">--}}
{{--					<div class="box">--}}
{{--						<div class="box-header">--}}
{{--							<h3 class="box-title">Sales Overview</h3>--}}
{{--						</div>--}}
{{--						<div class="box-body">--}}
{{--							<div class="d-flex mb-50 align-items-center justify-content-between max-w-300">--}}
{{--								<div>--}}
{{--									<p class="mb-0 text-fade">Profit</p>--}}
{{--									<h3 class="my-0">$25K</h3>--}}
{{--									<p class="mb-0 text-success"><i class="fa fa-arrow-up me-5"></i>2.37%</p>--}}
{{--								</div>--}}
{{--								<div class="mx-30">--}}
{{--									<p class="mb-0 text-fade">Expense</p>--}}
{{--									<h3 class="my-0">$39K</h3>--}}
{{--									<p class="mb-0 text-success"><i class="fa fa-arrow-up me-5"></i>1.74%</p>--}}
{{--								</div>--}}
{{--								<div>--}}
{{--									<p class="mb-0 text-fade">Revenue</p>--}}
{{--									<h3 class="my-0">$208B</h3>--}}
{{--									<p class="mb-0 text-danger"><i class="fa fa-arrow-down me-5"></i>7.37%</p>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--							<div id="sales_overview"></div>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--				<div class="col-xl-4 col-12">--}}
{{--					<div class="box">--}}
{{--						<div class="box-header">--}}
{{--							<h3 class="box-title">Production By Unit</h3>--}}
{{--						</div>--}}
{{--						<div class="box-body">--}}
{{--							<div id="production_overview"></div>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--				<div class="col-xl-4 col-12">--}}
{{--					<div class="box">--}}
{{--						<div class="box-header">--}}
{{--							<h3 class="box-title">--}}
{{--								Plant Productivity--}}
{{--							</h3>--}}
{{--						</div>--}}
{{--						<div class="box-body">--}}
{{--							<div class="d-flex align-items-center justify-content-between">--}}
{{--								<h1 class="my-0 fw-500 text-info">88.11%</h1>--}}
{{--								<div id="chart88"></div>--}}
{{--							</div>--}}
{{--							<div class="d-flex align-items-center justify-content-between">--}}
{{--								<div class="bg-light px-10 py-10 me-10 min-w-p65">--}}
{{--									<h4 class="mb-0"><small class="me-30">Target:</small>85.00%</h4>--}}
{{--								</div>--}}
{{--								<div class="bg-success px-10 py-10 w-p100">--}}
{{--									<h4 class="mb-0"><span class="text-white me-10"><i class="fa fa-arrow-up"></i></span>5.0%</h4>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--				<div class="col-xl-8 col-12">--}}
{{--					<div class="box box-body">--}}
{{--						<div class="row">--}}
{{--							<div class="col-lg-8 col-12">--}}
{{--								<div class="box no-border mb-0 no-shadow">--}}
{{--									<div class="box-header no-border">--}}
{{--										<h3 class="box-title">Order Overview</h3>--}}
{{--										<ul class="box-controls">--}}
{{--											<li><button class="btn btn-xs btn-danger" href="#">Monthly</button></li>--}}
{{--											<li><button class="btn btn-xs btn-info" href="#">Weeks</button></li>--}}
{{--										</ul>--}}
{{--									</div>--}}
{{--									<div class="box-body p-0">--}}
{{--										<div id="order-summary-chart"></div>--}}
{{--									</div>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--							<div class="col-lg-4 col-12">--}}
{{--								<div class="box mb-0 bg-lightest">--}}
{{--									<div class="box-header no-border pb-0">--}}
{{--										<h4 class="box-title">Top Products</h4>--}}
{{--									</div>--}}
{{--									<div class="box-body">--}}
{{--									  <div class="d-flex justify-content-between align-items-center mb-10">--}}
{{--										<div>--}}
{{--										  <h5 class="mb-0">iPod</h5>--}}
{{--										</div>--}}
{{--										<div>--}}
{{--										  <h6 class="mb-0"><span class="text-success">+</span> $250</h6>--}}
{{--										</div>--}}
{{--									  </div>--}}
{{--									  <div class="d-flex justify-content-between align-items-center mb-10">--}}
{{--										<div>--}}
{{--										  <h5 class="mb-0">iMac</h5>--}}
{{--										</div>--}}
{{--										<div>--}}
{{--										  <h6 class="mb-0"><span class="text-danger">-</span> $589</h6>--}}
{{--										</div>--}}
{{--									  </div>--}}
{{--									  <div class="d-flex justify-content-between align-items-center">--}}
{{--										<div>--}}
{{--										  <h5 class="mb-0">iPhone x</h5>--}}
{{--										</div>--}}
{{--										<div>--}}
{{--										  <h6 class="mb-0"><span class="text-success">+</span> $1292</h6>--}}
{{--										</div>--}}
{{--									  </div>--}}
{{--									</div>--}}
{{--									<div class="box-footer">--}}
{{--									  <h4 class="mb-0">Total Sales</h4>--}}
{{--									  <p class="text-primary fs-18 fw-700">$8,459k</p>--}}
{{--									  <div class="progress">--}}
{{--										<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">--}}
{{--										  <span class="sr-only">40% Complete (primary)</span>--}}
{{--										</div>--}}
{{--									  </div>--}}
{{--									</div>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</div>--}}
				<div class="col-xl-7 col-12">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Regional Sales</h3>
						</div>
						<div class="box-body">
							<div id="regional_sales" class="h-500"></div>
						</div>
					</div>
				</div>
				<div class="col-xl-5 col-12">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Sales By Customer Location</h3>
						</div>
						<div class="box-body">
                            <div id="chartdiv" class="h-500"></div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /.content -->
	  </div>
  </div>
<script src="{{ asset('assets/vendor_components/c3/d3.min.js' )}}"></script>
<script src="{{ asset('assets/vendor_components/c3/c3.min.js' ) }}"></script>
<script src="{{ asset('assets/src/js/pages/c3-bar-pie.js' ) }}"></script>
<script>
    var o = c3.generate({
        bindto: "#pie-chart",
        color: { pattern: ["#673ab7", "#4974e0", "#3db76b","#000"] },
        data: {
            columns: [
                ["Lead", {{count($all_leads)}}],
                ["Opportunity", {{count($opportunity_leads)}}],
                ["Account",{{count($converted_leads)}}],
                ["Lost", {{count($lost_leads)}}]
            ],
            type: "pie",
            onclick: function(o, n) { console.log("onclick", o, n) },
            onmouseover: function(o, n) { console.log("onmouseover", o, n) },
            onmouseout: function(o, n) { console.log("onmouseout", o, n) }
        }
    });
    var stackedColumnChart = c3.generate({
        bindto: '#stacked-column',
        size: { height: 400 },
        color: { pattern: ["#673ab7", "#4974e0", "#3db76b","#000"] },

        // Create the data table.
        data: {
            columns: [
                ["Lead", {{count($all_leads)}}],
                ["Opportunity", {{count($opportunity_leads)}}],
                ["Account",{{count($converted_leads)}}],
                ["Lost", {{count($lost_leads)}}]
            ],
            type: 'bar',
            groups: [
                ["data1", "data2"]
            ]
        },
        grid: {
            y: {
                show: true
            }
        },
    });



// Create map instance
    var chart = am4core.create("chartdiv", am4maps.MapChart);

    // Set map definition
    chart.geodata = am4geodata_worldLow;

    // Set projection
    chart.projection = new am4maps.projections.Miller();

    // Create map polygon series
    var polygonSeries = chart.series.push(new am4maps.MapPolygonSeries());

    // Make map load polygon (like country names) data from GeoJSON
    polygonSeries.useGeodata = true;

    // Configure series
    var polygonTemplate = polygonSeries.mapPolygons.template;
    polygonTemplate.tooltipText = "{name}";
    polygonTemplate.fill = am4core.color("#C0C0C0");

    // Create hover state and set alternative fill color
    var hs = polygonTemplate.states.create("hover");
    hs.properties.fill = am4core.color("#4686ee");

    // Remove Antarctica
    polygonSeries.exclude = ["AQ"];

    // Add some data
    polygonSeries.data = [
        @if(!empty($all_leads))
        <?php $codes = array("Afghanistan"=>"AF","Aland Islands"=> "AX", "Albania"=>"AL", "Algeria"=>"DZ", "American Samoa"=>"AS", "Andorra"=>"AD","Angola"=> "AO", "Anguilla"=>"AI","Antarctica"=> "AQ", "Antigua and Barbuda"=>"AG","Argentina"=> "AR","Armenia"=> "AM","Aruba"=>"AW","Australia"=>"AU","Austria"=>"AT","Azerbaijan"=>"AZ","Bahamas"=>"BS","Bahrain"=>"BH","Bangladesh"=>"BD","Barbados"=>"BB","Belarus"=>"BY","Belgium"=>"BE","Belize"=>"BZ","Benin"=>"BJ","Bermuda"=>"BM","Bhutan"=>"BT","Bolivia"=>"BO","Bonaire, Sint Eustatius and Saba"=>"BQ","Bosnia and Herzegovina"=>"BA","Botswana"=>"BW","Bouvet Island"=>"BV","Brazil"=>"BR","British Indian Ocean Territory"=>"IO","Brunei Darussalam"=>"BN","Bulgaria"=>"BG","Burkina Faso"=>"BF","Burundi"=>"BI","Cambodia"=>"KH","Cameroon"=>"CM","Canada"=>"CA","Cape Verde"=>"CV","Cayman Islands"=>"KY","Central African Republic"=>"CF","Chad"=>"TD","Chile"=>"CL","China"=>"CN","Christmas Island"=>"CX","Cocos (Keeling) Islands"=>"CC","Colombia"=>"CO","Comoros"=>"KM","Congo"=>"CG","Congo, Democratic Republic of the Congo"=>"CD","Cook Islands"=>"CK","Costa Rica"=>"CR","Cote D'Ivoire"=>"CI","Croatia"=>"HR","Cuba"=>"CU","Curacao"=>"CW","Cyprus"=>"CY","Czech Republic"=>"CZ","Denmark"=>"DK","Djibouti"=>"DJ","Dominica"=>"DM","Dominican Republic"=>"DO","Ecuador"=>"EC","Egypt"=>"EG","El Salvador"=>"SV","Equatorial Guinea"=>"GQ","Eritrea"=>"ER","Estonia"=>"EE","Ethiopia"=>"ET","Falkland Islands (Malvinas)"=>"FK","Faroe Islands"=>"FO","Fiji"=>"FJ","Finland"=>"FI","France"=>"FR","French Guiana"=>"GF","French Polynesia"=>"PF","French Southern Territories"=>"TF","Gabon"=>"GA","Gambia"=>"GM","Georgia"=>"GE","Germany"=>"DE","Ghana"=>"GH","Gibraltar"=>"GI","Greece"=>"GR","Greenland"=>"GL","Grenada"=>"GD","Guadeloupe"=>"GP","Guam"=>"GU","Guatemala"=>"GT","Guernsey"=>"GG","Guinea"=>"GN","Guinea-Bissau"=>"GW","Guyana"=>"GY","Haiti"=>"HT","Heard Island and Mcdonald Islands"=>"HM","Holy See (Vatican City State)"=>"VA","Honduras"=>"HN","Hong Kong"=>"HK","Hungary"=>"HU","Iceland"=>"IS","India"=>"IN","Indonesia"=>"ID","Iran, Islamic Republic of"=>"IR","Iraq"=>"IQ","Ireland"=>"IE","Isle of Man"=>"IM","Israel"=>"IL","Italy"=>"IT","Jamaica"=>"JM","Japan"=>"JP","Jersey"=>"JE","Jordan"=>"JO","Kazakhstan"=>"KZ","Kenya"=>"KE","Kiribati"=>"KI","Korea, Democratic People's Republic of"=>"KP","Korea, Republic of"=>"KR","Kosovo"=>"XK","Kuwait"=>"KW","Kyrgyzstan"=>"KG","Lao People's Democratic Republic"=>"LA","Latvia"=>"LV","Lebanon"=>"LB","Lesotho"=>"LS","Liberia"=>"LR","Libyan Arab Jamahiriya"=>"LY","Liechtenstein"=>"LI","Lithuania"=>"LT","Luxembourg"=>"LU","Macao"=>"MO","Macedonia, the Former Yugoslav Republic of"=>"MK","Madagascar"=>"MG","Malawi"=>"MW","Malaysia"=>"MY","Maldives"=>"MV","Mali"=>"ML","Malta"=>"MT","Marshall Islands"=>"MH","Martinique"=>"MQ","Mauritania"=>"MR","Mauritius"=>"MU","Mayotte"=>"YT","Mexico"=>"MX","Micronesia, Federated States of"=>"FM","Moldova, Republic of"=>"MD","Monaco"=>"MC","Mongolia"=>"MN","Montenegro"=>"ME","Montserrat"=>"MS","Morocco"=>"MA","Mozambique"=>"MZ","Myanmar"=>"MM","Namibia"=>"NA","Nauru"=>"NR","Nepal"=>"NP","Netherlands"=>"NL","Netherlands Antilles"=>"AN","New Caledonia"=>"NC","New Zealand"=>"NZ","Nicaragua"=>"NI","Niger"=>"NE","Nigeria"=>"NG","Niue"=>"NU","Norfolk Island"=>"NF","Northern Mariana Islands"=>"MP","Norway"=>"NO","Oman"=>"OM","Pakistan"=>"PK","Palau"=>"PW","Palestinian Territory, Occupied"=>"PS","Panama"=>"PA","Papua New Guinea"=>"PG","Paraguay"=>"PY","Peru"=>"PE","Philippines"=>"PH","Pitcairn"=>"PN","Poland"=>"PL","Portugal"=>"PT","Puerto Rico"=>"PR","Qatar"=>"QA","Reunion"=>"RE","Romania"=>"RO","Russian Federation"=>"RU","Rwanda"=>"RW","Saint Barthelemy"=>"BL","Saint Helena"=>"SH","Saint Kitts and Nevis"=>"KN","Saint Lucia"=>"LC","Saint Martin"=>"MF","Saint Pierre and Miquelon"=>"PM","Saint Vincent and the Grenadines"=>"VC","Samoa"=>"WS","San Marino"=>"SM","Sao Tome and Principe"=>"ST","Saudi Arabia"=>"SA","Senegal"=>"SN","Serbia"=>"RS","Serbia and Montenegro"=>"CS","Seychelles"=>"SC","Sierra Leone"=>"SL","Singapore"=>"SG","Sint Maarten"=>"SX","Slovakia"=>"SK","Slovenia"=>"SI","Solomon Islands"=>"SB","Somalia"=>"SO","South Africa"=>"ZA","South Georgia and the South Sandwich Islands"=>"GS","South Sudan"=>"SS","Spain"=>"ES","Sri Lanka"=>"LK","Sudan"=>"SD","Suriname"=>"SR","Svalbard and Jan Mayen"=>"SJ","Swaziland"=>"SZ","Sweden"=>"SE","Switzerland"=>"CH","Syrian Arab Republic"=>"SY","Taiwan, Province of China"=>"TW","Tajikistan"=>"TJ","Tanzania, United Republic of"=>"TZ","Thailand"=>"TH","Timor-Leste"=>"TL","Togo"=>"TG","Tokelau"=>"TK","Tonga"=>"TO","Trinidad and Tobago"=>"TT","Tunisia"=>"TN","Turkey"=>"TR","Turkmenistan"=>"TM","Turks and Caicos Islands"=>"TC","Tuvalu"=>"TV","Uganda"=>"UG","Ukraine"=>"UA","United Arab Emirates"=>"AE","United Kingdom"=>"GB","United States"=>"US","United States Minor Outlying Islands"=>"UM","Uruguay"=>"UY","Uzbekistan"=>"UZ","Vanuatu"=>"VU","Venezuela"=>"VE","Viet Nam"=>"VN","Virgin Islands, British"=>"VG","Virgin Islands, U.s."=>"VI","Wallis and Futuna"=>"WF","Western Sahara"=>"EH","Yemen"=>"YE","Zambia"=>"ZM","Zimbabwe"=>"ZW"); ?>
        @foreach($all_leads as $leads)
        @if(array_key_exists($leads['country'],$codes))

            {
            "id": "{{$codes[$leads['country']]}}",
            "name": "{{$leads['country']}}",
            "value": 100,
            "fill": am4core.color("#4686ee")
            },

        @endif
        @endforeach
        @endif
    ];
    // Bind "fill" property to "fill" key in data
    polygonTemplate.propertyFields.fill = "fill";



    $(function () {
        'use strict';
        am4core.ready(function() {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            var chart = am4core.create("regional_sales", am4charts.PieChart3D);
            chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

            chart.legend = new am4charts.Legend();

            chart.data = [
                @if(!empty($country_wise_leads))
                @foreach($country_wise_leads as $leads)
                {
                    country: "{{$leads['country']}}",
                    litres: {{$leads['total']}}
                },
                @endforeach
                @endif
            ];

            chart.innerRadius = 50;

            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "litres";
            series.dataFields.category = "country";

        }); // end am4core.ready()
    });

</script>
@include('admin.footer')
