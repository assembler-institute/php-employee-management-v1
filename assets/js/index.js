new gridjs.Grid({
    columns: ["Name", "Email", "Street No.", "Age", "City", "State", "Postal Code", "Phone Number"],
    data: [
      ["John", "john@example.com", "89",  "34", "NewYork", "CA", "09889", "(353) 01 222 3333"],
      ["John", "john@example.com", "89"," 34", "NewYork", "CA", "09889", "(353) 01 222 3333"],
      ["John", "john@example.com", "89", "34", "NewYork", "CA", "09889", "(353) 01 222 3333"],
      ["John", "john@example.com", "89", "34", "NewYork", "CA", "09889", "(353) 01 222 3333"],
      ["John", "john@example.com", "89", "34", "NewYork", "CA", "09889", "(353) 01 222 3333"]
    ]
  }).render(document.getElementById("JsGrid"));