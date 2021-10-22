import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import Container from 'react-bootstrap/Container';
import { Form, Button, Group, Select, Col, Row, FloatingLabel, InputGroup, FormControl, OverlayTrigger, Tooltip, Image, ProgressBar } from 'react-bootstrap';



class FormReactContent extends React.Component {
    constructor(props) {
      super(props);
      this.state = {
        isGoing: true,
        numberOfGuests: 2
      };
  
      this.handleInputChange = this.handleInputChange.bind(this);

	  
    }

	 
  
    handleInputChange(event) {
      const target = event.target;
      const value = target.type === 'checkbox' ? target.checked : target.value;
      const name = target.name;
  
      this.setState({
        [name]: value
      });
    }
 
    render() {
      return (
        <Container>
<OverlayTrigger
    placement="bottom"
    overlay={<Tooltip id="button-tooltip-2">Check out this avatar</Tooltip>}
  >
    {({ ref, ...triggerHandler }) => (
      <Button
        variant="dark"
        {...triggerHandler}
        className="d-inline-flex align-items-center"
      >
     <Image
          ref={ref}
          roundedCircle
          src="holder.js/20x20?text=J&bg=28a745&fg=FFF"
        />
        <span className="ms-1">Hover to see</span>
      </Button>
    )}
  </OverlayTrigger>


<InputGroup className="mb-3">
    <InputGroup.Text id="basic-addon1">@</InputGroup.Text>
    <FormControl
      placeholder="Username"
      aria-label="Username"
      aria-describedby="basic-addon1"

	 
    />
  </InputGroup>

  <InputGroup className="mb-3">
    <FormControl
      placeholder="Recipient's username"
      aria-label="Recipient's username"
      aria-describedby="basic-addon2"
    />
    <InputGroup.Text id="basic-addon2">@example.com</InputGroup.Text>
  </InputGroup>

  <Form.Label htmlFor="basic-url">Your vanity URL</Form.Label>
  <InputGroup className="mb-3">
    <InputGroup.Text id="basic-addon3">
      https://example.com/users/
    </InputGroup.Text>
    <FormControl id="basic-url" aria-describedby="basic-addon3" />
  </InputGroup>

  <InputGroup className="mb-3">
    <InputGroup.Text>$</InputGroup.Text>
    <FormControl aria-label="Amount (to the nearest dollar)" />
    <InputGroup.Text>.00</InputGroup.Text>
  </InputGroup>

  <InputGroup>
    <InputGroup.Text>With textarea</InputGroup.Text>
    <FormControl as="textarea" aria-label="With textarea" />
  </InputGroup>
			<Row>
				<Col>1 of 3</Col>
				<Col xs={6}>2 of 3 (wider)</Col>
				<Col>3 of 3</Col>
			</Row>
			<Row>
				<Col>1 of 3</Col>
				<Col xs={5}>2 of 3 (wider)</Col>
				<Col>3 of 3</Col>
			</Row>



        <Form>
          <Form.Group controlId="formName">
              <Form.Label>Name</Form.Label>
              <Form.Control type="text" placeholder="Enter name" />
          </Form.Group>

          <Form.Label>
            Wybiera się:
            <input
              name="isGoing"
              type="checkbox"
              checked={this.state.isGoing}
              onChange={this.handleInputChange} />
          </Form.Label>

          <Row className="g-2">
  <Col md>
    <FloatingLabel controlId="floatingInputGrid" label="Email address">
      <Form.Control type="email" placeholder="name@example.com" />
    </FloatingLabel>
  </Col>
  <Col md>
    <FloatingLabel controlId="floatingSelectGrid" label="Works with selects">
      <Form.Select aria-label="Floating label select example">
        <option>Open this select menu</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </Form.Select>
    </FloatingLabel>
  </Col>
</Row>
<Row>
<InputGroup className="mb-3">
    <InputGroup.Checkbox aria-label="Checkbox for following text input" />
    <FormControl aria-label="Text input with checkbox" />
  </InputGroup>
  <InputGroup>
    <InputGroup.Radio aria-label="Radio button for following text input" />
    <FormControl aria-label="Text input with radio button" />
  </InputGroup>
</Row>
        </Form>
		<Row>
			<ProgressBar now={60} />
		</Row>
        </Container>

		
      );
    }
  }
  if (document.getElementById('FormReactContent')) {
    ReactDOM.render(<FormReactContent />, document.getElementById('FormReactContent'));
  }
  


