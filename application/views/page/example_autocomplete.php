
    <div class="intro-box">
        <h1>Autocomplete Example</h1>

        <p>Autocomplete search example using "Ajax" to query a "remote" json datasource.</p>
    </div>

    <div class="clearfix"></div>

    <div class="content-box">
        <div id="slider">
            <ul class="navigation">
                <li><a href="#autocomplete">Autocomplete</a></li>
            </ul>

            <div class="scrollWrap">
                <div class="scroll">
                    <div class="scrollContainer">
                        <div class="panel" id="autocomplete">
                            <h3>Please type a phrase in the searchbox below.</h3>
                            <h4>Example: BQI was down for the day but BANI was up, so were BPAX,CABC, and CABL</h4>
<style type="text/css">
div.response {
float: left;
width: 200px;
height: auto;
padding: 10px;
border: 1px solid #ACACAC;
background-color: white;
position: relative;
top: 6px;
left: 10px;
}
div.response h5 {margin-bottom: 4px;}
div.response ol li {
font-size: 11px;
}

textarea#ac_search {
    width: 300px;
    height: 80px;
    float:left;
}
</style>


<textarea id="ac_search">

</textarea>
<div class="response">
    <h5>Matched items:</h5>
    <ol>
    </ol>
</div>

<script type="text/javascript">

$(function() {
    $("#ac_search").on('keyup',function() {
        var data = { "ac_search": $("#ac_search").val()};
        $.ajax({
            url: "/autocomplete",
            data: data,
            type: "GET",
            dataType: "JSON",
            success: function(r) {
                if ((!r.errors) && (r.matches.length)) {
                    if (r.matches !== false) {
                        $.each(r.matches, function(ix,obj) {
                            $('.response ol').append("<li>"+obj+"</li>");
                        });
                    }
                }
            }
        });
    });
});
</script>

                        </div>
                    </div>
                </div>
            </div>

            <div class="slider-bottom"></div>
        </div><!-- end slider -->
    </div>
