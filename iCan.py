import requests

active = True

while active:
	code = input()
	if code == "q":
		active = False
		break
		
	url = "http://api.upcdatabase.org/product/" + code + "/4EBA8D8CC6C8F6744D9B85C8C9DBF81A"

	r = requests.get(url = url, params = None) 
	data = r.json()
	items = {}
	try:
		with open("shoppinglist.html") as file:
			number = 1
			text = ""
			line = file.readline()
			while line:
				number = line.split(' ', 1)[0]
				text = line.split(' ', 1)[1]
				items.update({text: number})
				line = file.readline()
	except:
		pass

	file = open("shoppinglist.html","w")
	newstring = ""
	# print(data)
	if (data["status"] != 200):
		url = "http://api.upcdatabase.org/product/0" + code + "/4EBA8D8CC6C8F6744D9B85C8C9DBF81A"
		r = requests.get(url = url, params = None) 
		data = r.json()
		if (data["status"] != 200):
			newstring = "Unidentified Item " + code
		else:
			if (data["alias"]) != "":
				newstring = data["alias"] + " "
			elif (data["title"]) != "":
				newstring = data["title"] + " "
			elif (data["description"]) != "":
				newstring = data["description"] + " "

			if (data["size"]) != "":
				newstring += data["size"] + " "

			if (data["color"]) != "":
				newstring += data["color"] + " "

	else:
		if (data["alias"]) != "":
			newstring = data["alias"] + " "
		elif (data["title"]) != "":
			newstring = data["title"] + " "
		elif (data["description"]) != "":
			newstring = data["description"] + " "

		if (data["size"]) != "":
			newstring += data["size"] + " "

		if (data["color"]) != "":
			newstring += data["color"] + " "

	newstring += ".\n"
	if (newstring in items):
		items[newstring] = int(items[newstring]) + 1
	else:
		items.update({newstring: 1})

	for key in items:
		file.write(str(items[key]) + " " + key)

	# print(items)
	print("Item Added")
	file.close()

