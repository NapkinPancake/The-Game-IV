    <div class="row">
        <div class="col-4">
            <input type="image" id="BackGroundImg" alt="meme"
                src="https://hsl.guru/wp-content/uploads/2015/11/14279748638979.jpg">
        </div>
        <div class="col-4" class="center">
            <h1>Вгадайка III </h1>
            <br>
            <form>
                <input class="Text" type="text" name="try" placeholder="Нумерочок від 1 до 10 " id="try1">
                <br><br>
                <input class="Text" type="text" readonly name="answer" id="answer1" value="">
                <br>
                <input class="buttons" type="button" id="pushOne"
                    onclick="triesCounter();getValue();savingResulsts();raunds();blockTheName()" value="Тицяй">
                <input id="resetButt" class="buttons" type="button" name="resButton" value="Ресет"
                    onclick="form.reset();theNewBeginning()">
            </form>
        </div>
        <div class="col-4" id="WinForm">
            <input type="image" id="WinImg" alt="Fredie" src="img/meme.png">
        </div>
    </div>