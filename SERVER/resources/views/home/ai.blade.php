<div>

    <h2> This A tool that Generate A text ! </h2>



    <form action="/testing/ai" method="GET" >
        @csrf
        <input type="text" name="text">


        <button type="submit"> Generate </button>


    </form>

    <h3> Your Output !! </h3>


    <p> {{$text}} </p>

    <br/>

    <hr/>

    <h2> Get Your Amazon Products As excel file !! </h2>


    <form action="/testing/scap" method="GET" >
        @csrf
        <input type="text" name="q">


        <button type="submit"> get data from amazon </button>


    </form>








</div>
