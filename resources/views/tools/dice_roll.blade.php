<div class="pt-3 px-1 d-flex flex-column">
    <h4> 
        <form name="diceall" class="d-flex justify-content-center align-items-center mb-2">
            <select id="roll" name="roll" class="bg-dark">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
            <span class="mx-2">D</span>
            <select id="men" name="men" class="bg-dark">
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="6">6</option>
                <option value="8">8</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="100">100</option>
            </select>
        </form>
    </h4>
    <button type="button" onclick="getDiceall();" class="btn"><i class="fs-1 bi bi-dice-3"></i></button>
    <div class="d-flex justify-content-center">
    <p>
        <span id="condiceall"></span>：
        <span class="fw-semibold" id="condiceallsum"></span>
    </p>
    </div>
</div>

