
import sys
import os
from datetime import datetime

malicious_user = sys.argv[1]
malicious_pass = sys.argv[2]


# 2. Risk check karne ka logic (Default low hai)
risk = "low"
sets = ["select", "union"]

# Dono variables ki values ko ek sath check karne ke liye jod diya
all_words = malicious_user + malicious_pass

for word in sets:
    # Agar select ya union me se kuch bhi mila toh risk high ho jayega
    if word in all_words:
        risk = "high"
        break

# 3. exact filename aur folder path set kiya
filename = datetime.now().strftime("%Y%m%d_%H%M%S") + ".txt"

# Yeh line check karegi ki 'delete_reports' folder bana hai ya nahi, nahi toh bana degi
os.makedirs("reports", exist_ok=True)

# 4. File open karke variable values aur risk level write kiya
with open(f"reports/{filename}", "w") as file:
    file.write(f'Malicious activity Detected: \n{datetime.now().strftime("%Y%m%d_%H%M%S")}\n')  
    file.write(f"User Data: {malicious_user}\n")
    file.write(f"Pass Data: {malicious_pass}\n")
    file.write(f"Risk: {risk}\n")









