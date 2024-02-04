<form method = "POST"><br>
    <input  type="text" 
            name="first_name" 
            placeholder="Meno" 
            value="<?= htmlspecialchars($first_name) ?>"
            required>
    
    <input  type="text" 
            name="second_name" 
            placeholder="Priezvisko"    
            value="<?= htmlspecialchars($second_name) ?>"
            required>
    
    <input  type="number" 
            name="age" 
            placeholder="Vek" 
            min="10" 
            value="<?= htmlspecialchars($age) ?>"  
            required>
    
    <input  type="text" 
            name="college" 
            value="<?= htmlspecialchars($college) ?>"  
            placeholder="Mesto">

    <textarea   name="life" 
                placeholder="Podrobnosti o žiakovi" 
                id="" 
                cols="30" 
                rows="10"><?= htmlspecialchars($life) ?></textarea>
    
    <input type="submit" value="Uložiť">
</form>