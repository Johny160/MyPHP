<form method = "POST"><br>
    <input  type="text" 
            name="first_name" 
            placeholder="Meno" 
            value="<?= htmlspecialchars($first_name) ?>"
            required>
    <br>
    <input  type="text" 
            name="second_name" 
            placeholder="Priezvisko"    
            value="<?= htmlspecialchars($second_name) ?>"
            required>
    <br>
    <input  type="number" 
            name="age" 
            placeholder="Vek" 
            min="10" 
            value="<?= htmlspecialchars($age) ?>"  
            required>
    <br>
    <textarea   name="life" 
                placeholder="Podrobnosti o žiakovi" 
                id="" 
                cols="30" 
                rows="10"><?= htmlspecialchars($life) ?></textarea><br>
    <input  type="text" 
            name="college" 
            value="<?= htmlspecialchars($college) ?>"  
            placeholder="Mesto">
    <br>
    <input type="submit" value="Uložiť"><br>
</form>