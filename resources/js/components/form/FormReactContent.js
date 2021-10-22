import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import Container from 'react-bootstrap/Container';
import { Form, Button, Group, Select, Col, Row, FloatingLabel } from 'react-bootstrap';

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
        </Form>
     
       
        </Container>
      );
    }
  }
  if (document.getElementById('FormReactContent')) {
    ReactDOM.render(<FormReactContent />, document.getElementById('FormReactContent'));
  }
  


