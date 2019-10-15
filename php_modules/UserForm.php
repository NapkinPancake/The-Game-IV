<div class="row">
            <div class="col-4"></div>
            <div class="col-4" class="UsernameField">
                <form method="POST" id=userForm action=''>
                    <input type="text" name="username" id="Username" placeholder="Player Name">
                    <input type="submit" name="submit" id="nameButt" value="Choose" onclick="enteringName();setLvl()">
                    <select name="lvl" id="lvl">" 
                        <option value="Easy" id="lvl1">Легенько</option>
                        <option value="Medium" id="lvl2">Оптимально</option>
                        <option value="Hard" id="lvl3"> Важко</option>
                    </select>

                </form>
            </div>
            <div class="col-2"></div>
            <div class="col-2" >
                    <ul id=LiederShipTable >
                        
                    </ul>
            </div>
  </div>

