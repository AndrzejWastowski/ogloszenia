import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import DatePicker, { registerLocale }  from "react-datepicker";
import moment from "moment";
import pl from "date-fns/locale/pl"; // the locale you want


import "react-datepicker/dist/react-datepicker.css";

function DatePickerDiv() {
  const [checkInDate, setCheckInDate] = useState(null);
  const [checkOutDate, setCheckOutDate] = useState(null);

  const handleCheckInDate = (date) => {
    setCheckInDate(date);
    setCheckOutDate(null);
  };

  const handleCheckOutDate = (date) => {
    setCheckOutDate(date);
  };
 
  	const months = ['Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień']
	const days = ['Pn', 'Wt', 'Śr', 'Czw', 'Pt', 'Sb', 'Nd']


  return (
	<div class="container-fluid">
    <div class="row">
		<div class="col-md-3">
			<div className="input-container">
				<label class="form-label">Od</label>
				<DatePicker 
					wrapperClassName="datePicker"
					dateFormat="yyyy"				
					selected={checkInDate}
					minDate={new Date()}
					onChange={handleCheckInDate}
					class="form-control"
				/>
			</div>
		</div>

 
		<div class="col-md-3">
			<div className="input-container">
				<label class="form-label">Do</label>
				<DatePicker                
					dateFormat="yyyy"	
					selected={checkOutDate}
					minDate={checkInDate}
					onChange={handleCheckOutDate}
					class="form-control"
				/>
			</div>
		</div>
	</div>
      
      {checkInDate && checkOutDate && (
        <div className="summary">
          <p>
            Pojazdy wyprodukowane od: {moment(checkInDate).format("LL")} do {" "}             {moment(checkOutDate).format("LL")}.
          </p>
        </div>
      )}
    </div>
   
  );
}

export default DatePickerDiv;

if (document.getElementById('DatePickerDiv')) {
    ReactDOM.render(<DatePickerDiv />, document.getElementById('DatePickerDiv'));
}
